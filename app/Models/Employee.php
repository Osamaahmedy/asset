<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'password',
        'priority',
        'position',
        'department_id',
        'api_token'
    ];

    protected $hidden = ['password','api_token'];

    protected $casts = [
        'priority' => 'string',
        'position' => 'string',
    ];

    // تشفير الباسوورد تلقائياً عند الحفظ
    protected static function booted(): void
    {
        static::creating(function ($employee) {
            if ($employee->password) {
                $employee->password = Hash::make($employee->password);
            }
        });

        static::updating(function ($employee) {
            if ($employee->isDirty('password') && $employee->password) {
                $employee->password = Hash::make($employee->password);
            }
        });
    }

    // ─── Labels ──────────────────────────────────────────────────────────────

    public static function priorityOptions(): array
    {
        return [
            'high'   => 'عالي',
            'medium' => 'متوسط',
            'low'    => 'منخفض',
        ];
    }

    public static function positionOptions(): array
    {
        return [
            'employee'       => 'موظف',
            'office_manager' => 'مدير مكتب',
        ];
    }

    // ─── Relations ───────────────────────────────────────────────────────────

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
    public function maintenanceRequests()
{
    return $this->hasMany(MaintenanceRequest::class);
}
}
