<?php

namespace App\Filament\Resources\Employer\Notification\NotificationResource\Widgets;

use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Illuminate\Notifications\DatabaseNotification;

class EmployerNotificationsWidget extends Widget
{
    protected static string $view = 'filament.resources.employer.notification.notification-resource.widgets.employer-notifications-widget';

    public function getNotifications()
    {
        $notifications = DatabaseNotification::where('notifiable_id', auth()->id())->first();

        return $notifications;
    }

    public function showNotifications()
    {
        $notification = $this->getNotifications();

        if ($notification) {
            Notification::make()
                ->title('Thông báo từ hệ thống')
                ->body($notification->data['message'])
                ->send();

            // Đánh dấu thông báo này là đã đọc
            $notification->markAsRead();
        }
    }


    public function mount()
    {
        $this->showNotifications();
    }
}
