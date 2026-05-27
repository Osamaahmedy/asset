<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    use \App\Traits\LogsActivityInArabic;
    protected $fillable = ['name', 'part_number', 'quantity', 'price'];

    public function maintenances()
    {
        return $this->belongsToMany(Maintenance::class, 'maintenance_spare_part')
                    ->withPivot('quantity', 'cost')
                    ->withTimestamps();
    }
}
