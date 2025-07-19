<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Carbon\Carbon;
        use App\Models\Notification;

class Asset extends Model implements HasMedia
{
    use InteractsWithMedia;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'name',
        'purchase_date',
        'price',
        'vendor',
        'serial_number',
        'department_id',
        'last_maintenance_date',
        'maintenance_cycle_months',
    ];

    /**
     * Automatically generate a serial number when creating
     */
    protected static function booted()
    {

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

}
