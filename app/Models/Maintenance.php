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

    protected static function booted(): void
    {
        // ─── إنشاء ───────────────────────────────────────────────────────────
        static::created(function ($maintenance) {
            $statusLabel = self::statusLabel($maintenance->status);

            ActivityLog::log(
                action: 'maintenance',
                model: $maintenance,
                description: "تم إنشاء سجل صيانة جديد — الحالة: {$statusLabel} — التاريخ: {$maintenance->maintenance_date}"
            );
        });

        // ─── تعديل ───────────────────────────────────────────────────────────
        static::updated(function ($maintenance) {
            $changes = [];

            if ($maintenance->isDirty('status')) {
                $old = self::statusLabel($maintenance->getOriginal('status'));
                $new = self::statusLabel($maintenance->status);
                $changes[] = "الحالة: {$old} ← {$new}";
            }

            if ($maintenance->isDirty('maintenance_date')) {
                $old = $maintenance->getOriginal('maintenance_date');
                $new = $maintenance->maintenance_date;
                $changes[] = "التاريخ: {$old} ← {$new}";
            }

            if ($maintenance->isDirty('note')) {
                $changes[] = "تم تعديل الملاحظة";
            }

            $description = !empty($changes)
                ? implode(' | ', $changes)
                : 'تم تعديل سجل الصيانة';

            ActivityLog::log(
                action: 'updated',
                model: $maintenance,
                description: $description
            );

            // تحديث تاريخ آخر صيانة للأصل عند الاكتمال
            if ($maintenance->isDirty('status') && $maintenance->status === 'Maintenance Completed') {
                $maintenance->asset?->update([
                    'last_maintenance_date' => $maintenance->maintenance_date,
                ]);
            }
        });

        // ─── حذف ─────────────────────────────────────────────────────────────
        static::deleted(function ($maintenance) {
            ActivityLog::log(
                action: 'deleted',
                model: $maintenance,
                description: "تم حذف سجل الصيانة — التاريخ: {$maintenance->maintenance_date}"
            );

            // تحديث تاريخ آخر صيانة بعد الحذف
            $latest = $maintenance->asset
                ?->maintenances()
                ->where('status', 'Maintenance Completed')
                ->orderByDesc('maintenance_date')
                ->first();

            $maintenance->asset?->update([
                'last_maintenance_date' => $latest?->maintenance_date,
            ]);
        });
    }

    // ─── Helper: ترجمة الحالة ─────────────────────────────────────────────────

    private static function statusLabel(?string $status): string
    {
        return match ($status) {
            'Maintenance Completed' => '✅ اكتملت الصيانة',
            'Postponed'             => '⏳ مؤجلة',
            'Pending'               => '🕐 قيد الانتظار',
            default                 => $status ?? '—',
        };
    }

    // ─── Relations ───────────────────────────────────────────────────────────

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')->singleFile();
    }
}
