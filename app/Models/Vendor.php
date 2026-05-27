<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use \App\Traits\LogsActivityInArabic;
    protected $fillable = ['name', 'contact_person', 'phone', 'email', 'address'];
}
