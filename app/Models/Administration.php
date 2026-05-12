<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    protected $fillable = ['name', 'sector_id'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
