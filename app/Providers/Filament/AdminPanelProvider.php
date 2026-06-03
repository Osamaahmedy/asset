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
use Filament\SpatieLaravelMediaLibraryLibraryPlugin;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\MenuItem;
use App\Models\Notification;
use App\Models\Asset;
use App\Models\Department;
use App\Models\User;

class AdminPanelProvider extends PanelProvider
{
    /**
     * إعدادات لوحة التحكم المحسنة
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')

            // ─── السلاسة والأنيميشن (تأثير السلايدر الناعم) ────────
            ->spa() // تفعيل تكنولوجيا SPA لتنقل سلس وحركة فتح/إغلاق ناعمة جداً

            // ─── الهوية البصرية ───────────────────────────────────
            ->brandName(fn () => __('messages.resource.assets'))
            ->brandLogoHeight('2.5rem')
            ->favicon(fn () => asset('images/favicon.ico'))

            // ─── الألوان والتباين (تم دمج المكرر وتحسين التباين) ──
            ->colors([
                'primary'   => Color::Hex('#1e40af'), // أزرق داكن غني لتباين ممتاز مع النصوص
                'gray'      => Color::Zinc,           // Zinc يعطي تباين وعمق بصري مريح جداً في الـ Dark Mode
                'info'      => Color::Sky,
                'success'   => Color::Emerald,
                'warning'   => Color::Amber,          // ذهبي واضح للتحذيرات والأصول الهامة
                'danger'    => Color::Rose,
            ])

            // ─── الخط والاتجاه والوضع الليلي ────────────────────────
           // ->font('Tajawal', provider: \Filament\FontProviders\GoogleFontProvider::class)
            ->darkMode(true)

            // ─── إعدادات الـ Sidebar الجانبي ──────────────────────
            ->sidebarCollapsibleOnDesktop(true)
            ->sidebarWidth('17rem')
            ->collapsedSidebarWidth('4.5rem') // مساحة إضافية بسيطة لتحسين المظهر البصري للأيقونات

            // ─── تحسين البحث العام (Global Search) ────────────────
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->globalSearchDebounce('350ms') // تقليل وقت الانتظار لاستجابة أسرع وأكثر مرونة
            ->globalSearchFieldSuffix(fn () => '⌘K') // تلميح بصري أنيق للمستخدم داخل حقل البحث

            // ─── الإشعارات ────────────────────────────────────────
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')

            // ─── صفحات الدخول والحماية ───────────────────────────
            ->login()
            ->passwordReset()

            // ─── اكتشاف التلقائي للمكونات ────────────────────────
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')

            // ─── الصفحات والـ Widgets الثابتة ────────────────────
            ->pages([
                Pages\Dashboard::class,
            ])
            ->widgets([
                Widgets\AccountWidget::class,
            ])

            // ─── الإضافات (Plugins) ──────────────────────────────
            ->plugins([
                // SpatieLaravelMediaLibraryPlugin::make(), // فعّله إذا كنت تستخدمه
            ])

            // ─── قائمة المستخدم (الملف الشخصي وسويتش اللغة) ───────
            ->userMenuItems([
                // رابط الملف الشخصي الخاص بك
                'profile' => MenuItem::make()
                    ->label(fn () => __('messages.profile.title'))
                    ->url(fn (): string => \App\Filament\Pages\EditProfile::getUrl())
                    ->icon('heroicon-o-user-circle'),


            ])

            // ─── الـ Middleware ────────────────────────────────────
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
}
