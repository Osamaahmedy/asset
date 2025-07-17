<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssetDeletionConfirmation extends Model
{
    protected $fillable = [
        'asset_id',
            'requested_by',
        'is_confirmed',
    ];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }


public function requestedBy()
{
    return $this->belongsTo(\App\Models\User::class, 'requested_by');
}
protected static function booted()
{
    static::updated(function ($confirmation) {
        if ($confirmation->is_confirmed) {
            $asset = $confirmation->asset;
            if ($asset) {
                // حفظ اسم الأصل قبل الحذف
                $assetName = $asset->name;

                // تسجيل العملية في سجل الأنشطة
                \App\Models\ActivityLog::create([
                    'action' => 'تم حذف أصل',
                    'model_type' => \App\Models\Asset::class,
                    'model_id' => $asset->id,
                    'description' => "اسم الأصل: {$assetName}",
                ]);

                // حذف الأصل
                $asset->delete();

                // حذف طلب التأكيد
                $confirmation->delete();
            }
        }
    });
}

}

