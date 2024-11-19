<?php

namespace App\Notifications\Employer;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomVerifyEmail extends VerifyEmail
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Có thể bổ sung thêm các tham số nếu cần thiết
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__('auth.verification.title'))
            ->line(__('auth.verification.body'))
            ->action(__('auth.verification.button'), $this->verificationUrl($notifiable))
            ->line(__('auth.verification.thank_you'));
    }
}
