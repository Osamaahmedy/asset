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
            if ($handover->asset_id) {
                if ($handover->action_type === 'handover' && $handover->employee_id) {
                    // استلام -> تغيير الموظف والحالة فقط إلى "في العهدة"
                    $handover->asset->update([
                        'employee_id' => $handover->employee_id,
                        'status' => Asset::STATUS_IN_USE,
                    ]);
                } elseif ($handover->action_type === 'return') {
                    // إرجاع -> إزالة الموظف وتغيير الحالة إلى "متاح"
                    $handover->asset->update([
                        'employee_id' => null,
                        'status' => Asset::STATUS_AVAILABLE,
                    ]);
                }
            }
        });
    }

    public function asset() { return $this->belongsTo(Asset::class); }
    public function employee() { return $this->belongsTo(Employee::class); }
}
