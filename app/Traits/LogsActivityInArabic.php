<?php

namespace App\Traits;

use App\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;

trait LogsActivityInArabic
{
    /**
     * Boot the trait to listen for model events.
     */
    public static function bootLogsActivityInArabic()
    {
        static::created(function (Model $model) {
            static::logActivity($model, 'إضافة', static::getCreatedDescription($model));
        });

        static::updated(function (Model $model) {
            // Only log if something actually changed
            if ($model->wasChanged()) {
                static::logActivity($model, 'تعديل', static::getUpdatedDescription($model));
            }
        });

        static::deleted(function (Model $model) {
            static::logActivity($model, 'حذف', 'تم حذف السجل بالكامل');
        });
    }

    /**
     * Get a human-readable Arabic name for the model.
     */
    protected static function getArabicModelName(): string
    {
        $className = class_basename(static::class);
        $names = [
            'Asset' => 'أصل',
            'Vendor' => 'مورد',
            'Location' => 'موقع',
            'AssetHandover' => 'عهدة أصل',
            'Employee' => 'موظف',
            'Maintenance' => 'صيانة',
            'MaintenanceRequest' => 'طلب صيانة',
            'Department' => 'إدارة',
            'User' => 'مستخدم',
            'AssetType' => 'نوع أصل',
            'Administration' => 'إدارة عليا',
            'Branch' => 'فرع',
            'Sector' => 'قطاع',
            'Role' => 'صلاحية',
            'Permission' => 'إذن',
            'ExternalMaintenanceRequest' => 'طلب صيانة خارجي',
            'SparePart' => 'قطعة غيار',
        ];

        return $names[$className] ?? $className;
    }

    /**
     * Get the identifier name for the model (e.g. name, title).
     */
    protected function getModelIdentifier(): string
    {
        return $this->name ?? $this->title ?? $this->id ?? 'غير محدد';
    }

    /**
     * Get the description for a created event.
     */
    protected static function getCreatedDescription(Model $model): string
    {
        return "تمت إضافة " . static::getArabicModelName() . " جديد باسم: " . $model->getModelIdentifier();
    }

    /**
     * Get the description for an updated event.
     */
    protected static function getUpdatedDescription(Model $model): string
    {
        $changes = $model->getChanges();
        $original = $model->getOriginal();
        
        // Remove ignored columns
        unset($changes['updated_at'], $original['updated_at']);
        
        if (empty($changes)) {
            return "تم تحديث السجل بدون تغييرات فعلية.";
        }

        $description = "تم تعديل " . static::getArabicModelName() . " (" . $model->getModelIdentifier() . ").\nالتغييرات:\n";
        
        foreach ($changes as $key => $newValue) {
            $oldValue = $original[$key] ?? 'فارغ';
            
            // Format values for better readability
            $oldValue = is_array($oldValue) ? json_encode($oldValue, JSON_UNESCAPED_UNICODE) : $oldValue;
            $newValue = is_array($newValue) ? json_encode($newValue, JSON_UNESCAPED_UNICODE) : $newValue;
            
            $description .= "- الحقل [{$key}] تغير من ({$oldValue}) إلى ({$newValue}).\n";
        }

        return rtrim($description);
    }

    /**
     * Create the actual ActivityLog record.
     */
    protected static function logActivity(Model $model, string $action, string $description)
    {
        // Avoid logging if the model is ActivityLog itself
        if ($model instanceof ActivityLog) {
            return;
        }

        $modelName = $model->getModelIdentifier();
        
        // Attempt to extract department name if available
        $departmentName = null;
        if (isset($model->department_id) && method_exists($model, 'department')) {
            $departmentName = $model->department?->name;
        } elseif ($model instanceof Maintenance || $model instanceof MaintenanceRequest) {
            $departmentName = $model->asset?->department?->name;
        }

        ActivityLog::create([
            'action'          => $action,
            'model_type'      => get_class($model),
            'model_id'        => $model->getKey(),
            'model_name'      => $modelName,
            'department_name' => $departmentName,
            'user_name'       => auth()->user()?->name ?? 'نظام (System)',
            'description'     => $description,
        ]);
    }
}
