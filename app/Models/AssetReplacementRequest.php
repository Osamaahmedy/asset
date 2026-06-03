<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetReplacementRequest extends Model
{
    use HasFactory, \App\Traits\LogsActivityInArabic;

    protected $fillable = [
        'asset_id',
        'requester_id',
        'reason',
        'description',
        'notes',
        'target_location_id',
        'status', // pending, approved, rejected
        'approver_id',
        'approver_employee_id',
        'rejection_reason',
        'actioned_at',
    ];

    protected $casts = [
        'actioned_at' => 'datetime',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function targetLocation()
    {
        return $this->belongsTo(Location::class, 'target_location_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }

    public function approverEmployee()
    {
        return $this->belongsTo(Employee::class, 'approver_employee_id');
    }

    protected static function booted()
    {
        static::updated(function ($request) {
            // When replacement request is approved
            if ($request->wasChanged('status') && $request->status === 'approved') {
                $asset = $request->asset;
                if ($asset) {
                    // Update asset to Damaged/Scrap and move to target location
                    $asset->update([
                        'status' => Asset::STATUS_DAMAGED,
                        'location_id' => $request->target_location_id,
                        'employee_id' => null,
                        'is_personal' => false,
                    ]);

                    // Close any active handovers for this asset
                    $activeHandover = $asset->handovers()->whereNull('returned_at')->first();
                    if ($activeHandover) {
                        $activeHandover->update([
                            'returned_at' => now(),
                            'condition_on_return' => 'damaged',
                            'return_notes' => 'تم استبدال الأصل ونقله بموجب طلب موافق عليه.',
                        ]);
                    }
                }
            }
        });
    }
}
