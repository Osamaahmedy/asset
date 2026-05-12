<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'administration_id'];

    public function administration()
    {
        return $this->belongsTo(Administration::class);
    }

    public function sector()
    {
        return $this->hasOneThrough(
            Sector::class,
            Administration::class,
            'id',           // administration.id
            'id',           // sector.id
            'administration_id', // department.administration_id
            'sector_id'     // administration.sector_id
        );
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
