<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Carbon\Carbon;
        use App\Models\Notification;

class Asset extends Model implements HasMedia
{
    use \App\Traits\LogsActivityInArabic;

    use InteractsWithMedia;

    /**
     * Asset Status Constants
     */
    public const STATUS_AVAILABLE = 'متاح';
    public const STATUS_IN_USE = 'في العهدة';
    public const STATUS_MAINTENANCE = 'في الصيانة';
    public const STATUS_DAMAGED = 'تالف / مُكهّن';

    public static function getStatuses(): array
    {
        return [
            self::STATUS_AVAILABLE => __('messages.asset_status.available'),
            self::STATUS_IN_USE => __('messages.asset_status.in_use'),
            self::STATUS_MAINTENANCE => __('messages.asset_status.maintenance'),
            self::STATUS_DAMAGED => __('messages.asset_status.damaged'),
        ];
    }

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'name',
        'purchase_date',
        'price',
        'vendor_id',
        'serial_number',
        'department_id',
        'last_maintenance_date',
        'maintenance_cycle_months',
        'maintenance_due_date',
        'employee_id',
        'asset_type_id',
        'is_personal',
        'location_id',
        'warranty_months',
        'warranty_start_date',
        'status',
        'salvage_value',
        'useful_life_years',
    ];

    /**
     * Calculate Current Financial Book Value (Straight-Line Depreciation)
     */
    public function getCurrentBookValueAttribute(): ?float
    {
        // نعتمد على تاريخ بداية الضمان كبداية للحساب، وإذا كان غير موجود نعتمد على تاريخ الشراء
        $startDate = $this->warranty_start_date ?? $this->purchase_date;

        // إذا كانت المتغيرات الأساسية غير مكتملة، نعيد null لكي يعرف المستخدم أن الحساب لم يتم
        if (!$this->price || !$startDate || !$this->useful_life_years) {
            return null;
        }

        $cost = (float) $this->price;
        $salvage = (float) ($this->salvage_value ?? 0);
        $years = (int) $this->useful_life_years;

        if ($years <= 0) return null;

        $depreciationPerYear = ($cost - $salvage) / $years;
        $yearsUsed = \Carbon\Carbon::parse($startDate)->diffInYears(now());

        if ($yearsUsed >= $years) {
            return $salvage; // تم إهلاك الأصل بالكامل
        }

        $currentValue = $cost - ($depreciationPerYear * $yearsUsed);
        return max($salvage, $currentValue);
    }

    /**
     * Automatically generate a serial number when creating
     */
    protected static function booted()
    {
        static::saving(function ($asset) {
            if ($asset->last_maintenance_date && $asset->maintenance_cycle_months) {
                $asset->maintenance_due_date = \Carbon\Carbon::parse($asset->last_maintenance_date)
                    ->addMonths((int) $asset->maintenance_cycle_months)
                    ->toDateString();
            }
        });

        static::saved(function ($asset) {
            $status = $asset->maintenance_status;

            // If the status is not good, create a notification
            if ($status !== '✅ Good') {
                Notification::create([
                    'asset_id' => $asset->id,
                    'status' => $status,
                    'message' => "Maintenance Alert: Asset {$asset->name} status is {$status}",
                ]);
            }
        });

        static::creating(function ($asset) {
            $asset->serial_number = strtoupper('ASSET-' . uniqid());
        });

    static::deleting(function ($asset) {
    if (!$asset->deletionConfirmation || !$asset->deletionConfirmation->is_confirmed) {

        return false;
    }


});


    }

    /**
     * Media collections for image and document
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
        $this->addMediaCollection('document')->singleFile();
    }

    /**
     * Dynamic maintenance status
     */
   /**
 * Accessor for dynamic maintenance status
 */
    public function getMaintenanceStatusAttribute(): string
    {
        if (!$this->last_maintenance_date || !$this->maintenance_cycle_months) {
            return '❓ Unknown';
        }

        $nextDueDate = \Carbon\Carbon::parse($this->last_maintenance_date)->addMonths((int) $this->maintenance_cycle_months);
        $daysRemaining = now()->diffInDays($nextDueDate, false);

        if ($daysRemaining < 0) {
            return '❌ Overdue';
        } elseif ($daysRemaining <= 7) {
            return '⚠️ Less than a week';
        } elseif ($daysRemaining <= 30) {
            return '⚠️ Less than a month';
        } elseif ($daysRemaining <= 60) {
            return '🔔 Less than two months';
        }

        return '✅ Good';
    }

    public function getQrCodeAttribute(): string
    {
        $data = url('/api/assets/' . $this->id);
        $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::size(150)
            ->format('svg')
            ->generate($data);
        
        return 'data:image/svg+xml;base64,' . base64_encode($qrCode);
    }


    /**
     * Relationship: belongs to department
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Relationship: has many maintenances
     */
    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
    public function deletionConfirmation()
{
    return $this->hasOne(\App\Models\AssetDeletionConfirmation::class);
}
public function employee()
{
    return $this->belongsTo(Employee::class);
}
public function assetType()
{
    return $this->belongsTo(AssetType::class);
}
    public function maintenanceRequests()
    {
        return $this->hasMany(MaintenanceRequest::class);
    }
    
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

public function scopeVisibleTo($query, $employee)
{
    return $query->where(function ($q) use ($employee) {
        // أصول المكتب العامة
        $q->where(function ($inner) use ($employee) {
            $inner->where('department_id', $employee->department_id)
                  ->where('is_personal', false);
        })
        // أو أصول شخصية تخص هذا الموظف تحديداً
        ->orWhere(function ($inner) use ($employee) {
            $inner->where('is_personal', true)
                  ->where('employee_id', $employee->id);
        });
    });
}
/**
 * Accessor للحصول على اسم المورد مباشرة
 */
public function getVendorNameAttribute(): string
{
    return $this->vendor?->name ?? 'لا يوجد';
}
}
