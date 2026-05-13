<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExternalMaintenanceRequest extends Model
{
    protected $fillable = [
        'maintenance_request_id',
        'technical_description',
        'estimated_amount',
        'required_parts',
        'status',
        'rejection_reason',
        'admin_note',
        'created_by',
    ];

    public function maintenanceRequest(): BelongsTo
    {
        return $this->belongsTo(MaintenanceRequest::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public static function statusOptions(): array
    {
        return [
            'pending'   => '⏳ قيد الانتظار',
            'approved'  => '✅ مقبول',
            'completed' => '🏁 مكتمل',
            'rejected'  => '❌ مرفوض',
        ];
    }

    public static function statusColors(): array
    {
        return [
            'pending'   => 'warning',
            'approved'  => 'success',
            'completed' => 'info',
            'rejected'  => 'danger',
        ];
    }
}
