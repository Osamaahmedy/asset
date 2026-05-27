<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MaintenanceRequest extends Model
{
    use \App\Traits\LogsActivityInArabic;

    protected $fillable = [
        'asset_id',
        'employee_id',
        'problem_date',
        'problem_description',
        'priority',
        'status',
        'supervisor_note',
        'it_note',
    ];

    protected $casts = [
        'problem_date' => 'date',
    ];

    protected static function booted(): void
    {
        // ─── إنشاء ───────────────────────────────────────────────────────────
        static::created(function ($request) {
            if (in_array($request->status, ['pending', 'postponed'])) {
                $request->asset?->update([
                    'status' => \App\Models\Asset::STATUS_MAINTENANCE,
                ]);
            }
        });

        // ─── تعديل ───────────────────────────────────────────────────────────
        static::updated(function ($request) {
            if ($request->wasChanged('status')) {
                if ($request->status === 'completed') {
                    $asset = $request->asset;
                    if ($asset) {
                        $asset->update([
                            'last_maintenance_date' => now()->toDateString(),
                            'status' => $asset->employee_id ? \App\Models\Asset::STATUS_IN_USE : \App\Models\Asset::STATUS_AVAILABLE,
                        ]);
                    }
                } elseif (in_array($request->status, ['pending', 'postponed'])) {
                    $request->asset?->update([
                        'status' => \App\Models\Asset::STATUS_MAINTENANCE,
                    ]);
                }
            }
        });
    }

    public static function priorityOptions(): array
    {
        return [
            'high'   => __('messages.priority.high'),
            'medium' => __('messages.priority.medium'),
            'low'    => __('messages.priority.low'),
        ];
    }

    public static function statusOptions(): array
    {
        return [
            'pending'   => __('messages.status.pending'),
            'postponed' => __('messages.status.postponed'),
            'completed' => __('messages.status.completed'),
        ];
    }

    // ─── Relations ───────────────────────────────────────────────────────────

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    public function externalRequest(): HasOne
{
    return $this->hasOne(ExternalMaintenanceRequest::class);
}


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
