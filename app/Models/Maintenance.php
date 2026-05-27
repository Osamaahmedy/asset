<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Maintenance extends Model implements HasMedia
{
    use \App\Traits\LogsActivityInArabic;

    use InteractsWithMedia;

    protected $fillable = [
        'asset_id',
        'note',
        'maintenance_date',
        'status',
    ];

    protected static function booted(): void
    {
        // ─── إنشاء ───────────────────────────────────────────────────────────
        static::created(function ($maintenance) {
            if ($maintenance->status === 'Pending' || $maintenance->status === 'In Progress') {
                $maintenance->asset?->update([
                    'status' => \App\Models\Asset::STATUS_MAINTENANCE,
                ]);
            }
        });

        // ─── تعديل ───────────────────────────────────────────────────────────
        static::updated(function ($maintenance) {
            // تحديث تاريخ آخر صيانة للأصل وحالة الأصل عند الاكتمال
            if ($maintenance->wasChanged('status')) {
                if ($maintenance->status === 'Maintenance Completed') {
                    $asset = $maintenance->asset;
                    if ($asset) {
                        $asset->update([
                            'last_maintenance_date' => $maintenance->maintenance_date,
                            'status' => $asset->employee_id ? \App\Models\Asset::STATUS_IN_USE : \App\Models\Asset::STATUS_AVAILABLE,
                        ]);
                    }
                } elseif (in_array($maintenance->status, ['Pending', 'In Progress'])) {
                    $maintenance->asset?->update([
                        'status' => \App\Models\Asset::STATUS_MAINTENANCE,
                    ]);
                }
            }
        });

        // ─── حذف ─────────────────────────────────────────────────────────────
        static::deleted(function ($maintenance) {
            // تحديث تاريخ آخر صيانة بعد الحذف
            $latest = $maintenance->asset
                ?->maintenances()
                ->where('status', 'Maintenance Completed')
                ->orderByDesc('maintenance_date')
                ->first();

            $maintenance->asset?->update([
                'last_maintenance_date' => $latest?->maintenance_date,
            ]);
        });
    }

    // ─── Helper: ترجمة الحالة ─────────────────────────────────────────────────

    private static function statusLabel(?string $status): string
    {
        return match ($status) {
            'Maintenance Completed' => '✅ اكتملت الصيانة',
            'Postponed'             => '⏳ مؤجلة',
            'Pending'               => '🕐 قيد الانتظار',
            default                 => $status ?? '—',
        };
    }

    // ─── Relations ───────────────────────────────────────────────────────────

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function spareParts()
    {
        return $this->belongsToMany(SparePart::class, 'maintenance_spare_part')
                    ->withPivot('quantity', 'cost')
                    ->withTimestamps();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')->singleFile();
    }
}
