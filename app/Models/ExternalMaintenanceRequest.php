<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExternalMaintenanceRequest extends Model
{
    use \App\Traits\LogsActivityInArabic;

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
            'pending'   => '⏳ ' . __('messages.external_status.pending'),
            'approved'  => '✅ ' . __('messages.external_status.approved'),
            'completed' => '🏁 ' . __('messages.external_status.completed'),
            'rejected'  => '❌ ' . __('messages.external_status.rejected'),
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
