<?php

namespace App\Filament\Resources\Employer\Notification\NotificationResource\Pages;

use App\Filament\Resources\Employer\Notification\NotificationResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Notifications\DatabaseNotification;

//use Filament\Pages\Page;

class PageNotification extends Page
{
    protected static string $resource = NotificationResource::class;

    protected static string $view = 'filament.resources.employer.notification.notification-resource.pages.notifications-page';

    protected function getLabel(): string
    {
        return __('messages.page_notification');
    }

    public function getUnreadNotificationsCount()
    {
        $notifications = DatabaseNotification::where('notifiable_id', auth()->id())->where('read_at', null)->get();
        return $notifications->count();
    }

    public function getNotifications()
    {
        $notifications = DatabaseNotification::where('notifiable_id', auth()->id())->get();
        return $notifications;
    }

    public function showNotifications()
    {
        $notifications = $this->getNotifications();

        foreach ($notifications as $notification) {
            Notification::make()
                ->title('Thông báo từ hệ thống')
                ->body($notification->data['message'])
                ->send();
        }
    }

    public function mount()
    {
//        $this->showNotifications();
    }
}
