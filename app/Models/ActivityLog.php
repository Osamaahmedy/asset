<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'action',
        'model_type',
        'model_id',
                'description', // ✅ أضف هذا
    ];
    public function model()
{
    return $this->morphTo();
}

}
