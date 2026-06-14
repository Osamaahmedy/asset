<?php

namespace App\Models;

use App\Traits\LogsActivityInArabic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExternalMaintenanceRequest extends Model
{
    use LogsActivityInArabic;

    protected $fillable = [
        'maintenance_request_id',
        'technical_description',
        'estimated_amount',
        'currency',
        'required_parts',
        'status',
        'rejection_reason',
        'admin_note',
        'created_by',
        'created_by_employee',
    ];

    protected $casts = [
        'estimated_amount' => 'decimal:2',
    ];

    public function maintenanceRequest(): BelongsTo
    {
        return $this->belongsTo(MaintenanceRequest::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function creatorEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'created_by_employee');
    }

    public static function statusOptions(): array
    {
        return [
            'pending'   => __('messages.external_status.pending'),
            'approved'  => __('messages.external_status.approved'),
            'completed' => __('messages.external_status.completed'),
            'rejected'  => __('messages.external_status.rejected'),
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

    public static function currencyOptions(): array
    {
        return [
            'YER' => __('messages.currency.yer'),
            'SAR' => __('messages.currency.sar'),
            'USD' => __('messages.currency.usd'),
            'EUR' => __('messages.currency.eur'),
        ];
    }
}
