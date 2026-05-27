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

    /**
     * العلاقة مع الأقسام
     */
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

    /**
     * التحقق من صلاحية الوصول للوحة التحكم
     * يجب أن يكون لدى المستخدم role معين أو صلاحية معينة
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // السماح لأصحاب الأدوار فقط (أي مستخدم لديه role واحد على الأقل)
        return $this->roles()->exists();
    }
}
