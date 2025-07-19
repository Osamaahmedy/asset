<?php

namespace App\Providers\Filament;
use Illuminate\Database\Eloquent\Builder;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\SpatieLaravelMediaLibraryPlugin\SpatieLaravelMediaLibraryPlugin;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use App\Models\Notification;
use App\Models\Asset;
use App\Models\Department;
use App\Models\User;
class AdminPanelProvider extends PanelProvider
{
    /**
     * إعدادات لوحة التحكم
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName('Asest')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
               // Widgets\FilamentInfoWidget::class,
            ])
            ->plugins([
                // SpatieLaravelMediaLibraryPlugin::make(), // فعّله إذا كنت تستخدمه
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    /**
     * كود يتم تنفيذه عند تحميل لوحة التحكم (لإضافة الإشعارات)
     */
public function boot(): void
{
    Filament::serving(function () {
        // التأكد من وجود مستخدم
        if (!auth()->check()) {
            return;
        }

        // الحصول على معرفات الأقسام التي ينتمي إليها المستخدم
        $departmentIds = auth()->user()->departments()->pluck('departments.id')->toArray();

        $unreadCount = Notification::where('is_read', false)
    ->whereHas('asset', function ($query) use ($departmentIds) {
        $query->whereIn('department_id', $departmentIds);
    })
    ->count();

        Filament::registerNavigationItems([
            NavigationItem::make()
                ->label('Notifications')
                ->icon('heroicon-o-bell')
                ->url(route('filament.admin.resources.notifications.index'))
                ->badge($unreadCount),
        ]);
    });
}



}
