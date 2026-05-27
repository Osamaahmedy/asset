<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use \App\Traits\LogsActivityInArabic;


    protected $table = 'asset_notifications';

    protected $fillable = ['asset_id', 'status', 'message', 'is_read'];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
