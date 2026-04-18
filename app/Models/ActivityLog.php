<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'action',
        'model_type',
        'model_id',
        'model_name',
        'department_name',
        'description',
    ];

    public function model()
    {
        return $this->morphTo();
    }

    // ── Helper: أنشئ سجل مع حفظ الاسم فوراً ─────────────────────────────────
    public static function log(string $action, Model $model, ?string $description = null): self
    {
        // استخرج الاسم حسب نوع الموديل
        $modelName = match (true) {
            $model instanceof Asset       => $model->name,
            $model instanceof Maintenance => 'صيانة: ' . ($model->asset?->name ?? 'أصل محذوف'),
            default                       => $description ?? class_basename($model),
        };

        $departmentName = match (true) {
            $model instanceof Asset       => $model->department?->name,
            $model instanceof Maintenance => $model->asset?->department?->name,
            default                       => null,
        };

        return static::create([
            'action'          => $action,
            'model_type'      => get_class($model),
            'model_id'        => $model->getKey(),
            'model_name'      => $modelName,
            'department_name' => $departmentName,
            'description'     => $description,
        ]);
    }
}
