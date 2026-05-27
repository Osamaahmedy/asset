<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetType extends Model
{
    use \App\Traits\LogsActivityInArabic;

    protected $fillable = ['name'];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
