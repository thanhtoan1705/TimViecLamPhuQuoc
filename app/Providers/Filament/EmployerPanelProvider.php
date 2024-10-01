<?php

namespace App\Providers\Filament;

use App\Filament\Auth\EmployerLogin;
use App\Filament\Pages\Auth\Employer\RequestPasswordReset;
use App\Filament\Resources\Employer\Notification\NotificationResource\Pages\NotificationsPage;
use App\Filament\Resources\Pages\RegistrationEmployer;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;
use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;
use Saade\FilamentFullCalendar\FilamentFullCalendarPlugin;

class EmployerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('employer')
            ->path('business')
            ->login(EmployerLogin::class)
            ->registration(RegistrationEmployer::class)
            ->passwordReset(RequestPasswordReset::class)
            ->databaseNotifications()
            ->colors([
                'primary' => Color::Blue,
            ])
            ->navigationItems([
                NavigationItem::make('Đăng tin tuyển dụng')
                    ->group('Quản lý tin đăng')
                    ->url(config('app.url') . '/business/employer/job-post/job-posts/create')
                    ->sort(1)
                    ->icon('heroicon-o-folder-plus'),

            ])
            ->discoverResources(in: app_path('Filament/Resources/Employer'), for: 'App\\Filament\\Resources\\Employer')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Employer/Widgets'), for: 'App\\Filament\\Employer\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
//                EmployerNotificationsWidget::class,
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
            ])
            ->userMenuItems([
                'profile' => MenuItem::make()
                    ->label(fn() => Auth::user()->name)
                    ->url(fn(): string => EditProfilePage::getUrl())
                    ->icon('heroicon-m-user-circle')
            ])
            ->plugins([
                FilamentEditProfilePlugin::make()
                    ->setIcon('heroicon-o-user')
                    ->setTitle('Cập nhật hồ sơ')
                    ->setNavigationLabel('Cập nhật hồ sơ')
                    ->setNavigationGroup('Tài khoản')
                    ->shouldRegisterNavigation(true)
                    ->shouldShowDeleteAccountForm(false)
                    ->shouldShowEditProfileForm(false)
                    ->customProfileComponents([
                        \App\Livewire\FilamentEmployerUserProfile::class,
                        \App\Livewire\Filament\Employer\EmployerProfile::class,
                    ])
                    ->shouldShowAvatarForm(
                        value: true,
                        directory: 'avatars',
                        rules: 'mimes:jpeg,png|max:1024'
                    ),
                FilamentFullCalendarPlugin::make()
                    ->selectable()
                    ->editable()
                    ->config([
                        'dayMaxEvents' => true,
                        'moreLinkClick' => 'day'
                    ])
            ]);
    }
}
