<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
class User extends Authenticatable implements FilamentUser
{
    use \App\Traits\LogsActivityInArabic;

    use HasFactory, Notifiable, HasRoles;
public function departments()
{
    return $this->belongsToMany(Department::class);
}

    /**
     * الخصائص التي يمكن تعبئتها جماعياً
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * الخصائص التي يجب إخفاؤها عند التحويل إلى JSON
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * الخصائص التي يجب تحويل نوعها
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
public function canAccessPanel(Panel $panel): bool
{
    return true;
}

}
