<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MaintenanceRequest extends Model
{
    protected $fillable = [
        'asset_id',
        'employee_id',
        'problem_date',
        'problem_description',
        'priority',
        'status',
        'supervisor_note',
        'it_note',
    ];

    protected $casts = [
        'problem_date' => 'date',
    ];

    // عند اكتمال الطلب → حدّث تاريخ آخر صيانة للأصل
    protected static function booted(): void
{
    // إنشاء طلب جديد
    static::created(function ($request) {
        $priorityLabel = \App\Models\Employee::priorityOptions()[$request->priority] ?? $request->priority;

        ActivityLog::log(
            action: 'maintenance',
            model: $request->asset,   // نسجّل على الأصل
            description: "طلب صيانة جديد من: {$request->employee?->name} — الأولوية: {$priorityLabel} — {$request->problem_description}"
        );
    });

    // تغيير الحالة إلى مكتمل → حدّث آخر صيانة
    static::updated(function ($request) {
        if ($request->isDirty('status') && $request->status === 'completed') {
            $request->asset?->update([
                'last_maintenance_date' => now()->toDateString(),
            ]);

            ActivityLog::log(
                action: 'maintenance',
                model: $request->asset,
                description: "اكتمل طلب الصيانة — مرسل الطلب: {$request->employee?->name}"
            );
        }

        if ($request->isDirty('status') && $request->status === 'postponed') {
            ActivityLog::log(
                action: 'updated',
                model: $request->asset,
                description: "تم تأجيل طلب الصيانة — مرسل الطلب: {$request->employee?->name}"
            );
        }
    });
}

    public static function priorityOptions(): array
    {
        return [
            'high'   => 'عالي',
            'medium' => 'متوسط',
            'low'    => 'منخفض',
        ];
    }

    public static function statusOptions(): array
    {
        return [
            'pending'   => ' قيد الانتظار',
            'postponed' => ' مؤجل',
            'completed' => 'مكتمل',
        ];
    }

    // ─── Relations ───────────────────────────────────────────────────────────

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    public function externalRequest(): HasOne
{
    return $this->hasOne(ExternalMaintenanceRequest::class);
}


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
