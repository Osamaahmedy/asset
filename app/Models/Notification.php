<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $fillable = ['asset_id', 'status', 'message', 'is_read'];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
