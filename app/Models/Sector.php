<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['name'];

    public function administrations()
    {
        return $this->hasMany(Administration::class);
    }

    public function departments()
    {
        return $this->hasManyThrough(Department::class, Administration::class);
    }
}
