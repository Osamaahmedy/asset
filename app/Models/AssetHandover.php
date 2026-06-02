<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetHandover extends Model
{
    use \App\Traits\LogsActivityInArabic;
    protected $fillable = [
        'asset_id',
        'employee_id',
        'action_type',
        'handed_over_at',
        'returned_at',
        'condition_on_handover',
        'condition_on_return',
        'handover_notes',
        'return_notes',
        'notes',
    ];
    protected static function booted()
    {
        static::saved(function ($handover) {
            // When a handover is created or updated
            if ($handover->asset_id && $handover->employee_id) {
                if (is_null($handover->returned_at)) {
                    // Not returned yet -> Assign asset to this employee and change status
                    $handover->asset->update([
                        'employee_id' => $handover->employee_id,
                        'is_personal' => true, // Assuming personal if assigned to employee
                        'status' => Asset::STATUS_IN_USE,
                    ]);
                } else {
                    // Returned -> Remove employee from asset if it matches and change status
                    if ($handover->asset->employee_id == $handover->employee_id) {
                        $handover->asset->update([
                            'employee_id' => null,
                            'is_personal' => false,
                            'status' => Asset::STATUS_AVAILABLE,
                        ]);
                    }
                }
            }
        });
    }

    public function asset() { return $this->belongsTo(Asset::class); }
    public function employee() { return $this->belongsTo(Employee::class); }
}
