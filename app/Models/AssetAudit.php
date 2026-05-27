<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssetAudit extends Model
{
    use HasFactory, \App\Traits\LogsActivityInArabic;

    protected $fillable = [
        'name',
        'audit_date',
        'department_id',
        'location_id',
        'user_id',
        'status',
        'notes',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(AssetAuditItem::class);
    }
}
