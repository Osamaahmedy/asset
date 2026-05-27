<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssetDeletionConfirmation extends Model
{
    use \App\Traits\LogsActivityInArabic;

    protected $fillable = [
        'asset_id',
        'requested_by',
        'is_confirmed',
    ];

    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class);
    }

    public function requestedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'requested_by');
    }

    protected static function booted(): void
    {
        static::updated(function ($confirmation) {
            if ($confirmation->is_confirmed) {
                $asset = $confirmation->asset;

                if ($asset) {
                    // ── احفظ البيانات قبل الحذف ──────────────────────────
                    $assetName      = $asset->name;
                    $departmentName = $asset->department?->name;

                    // ── سجّل النشاط مع الاسم محفوظاً ─────────────────────
                    \App\Models\ActivityLog::create([
                        'action'          => 'Asset deleted',
                        'model_type'      => \App\Models\Asset::class,
                        'model_id'        => $asset->id,
                        'model_name'      => $assetName,
                        'department_name' => $departmentName,
                        'description'     => "تم حذف الأصل: {$assetName}",
                    ]);

                    // ── احذف الأصل وطلب التأكيد ───────────────────────────
                    $asset->delete();
                    $confirmation->delete();
                }
            }
        });
    }
}
