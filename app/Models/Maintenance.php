<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Maintenance extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'asset_id',
        'note',
        'maintenance_date',
        'status',
    ];

    /**
     * Update asset's last_maintenance_date when maintenance_date is created or updated
     */
    protected static function booted()
    {
        // عند الإنشاء أو التحديث
        static::saved(function ($maintenance) {
            if ($maintenance->status === 'تمت الصيانة') {
                $maintenance->asset?->update([
                    'last_maintenance_date' => $maintenance->maintenance_date,
                ]);
            }
        });

        // عند الحذف
        static::deleted(function ($maintenance) {
            $latest = $maintenance->asset
                ->maintenances()
                ->where('status', 'تمت الصيانة')
                ->orderByDesc('maintenance_date')
                ->first();

            $maintenance->asset?->update([
                'last_maintenance_date' => $latest?->maintenance_date,
            ]);
        });
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')->singleFile();
    }
}
