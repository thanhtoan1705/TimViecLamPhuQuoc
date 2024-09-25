<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmployerViewedProfileNotification extends Notification
{
    use Queueable;

    protected $jobPost;

    /**
     * Create a new notification instance.
     */
    public function __construct($jobPost)
    {
        $this->jobPost = $jobPost;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Nhà tuyển dụng đã xem hồ sơ của bạn cho vị trí ' . $this->jobPost->title)
            ->action('Xem chi tiết', url('/candidate/profile'))
            ->line('Cảm ơn bạn đã ứng tuyển!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Nhà tuyển dụng ' .  $this->jobPost->employer->company_name . ' đã xem hồ sơ của bạn cho vị trí ' . $this->jobPost->title,
            'job_post_id' => $this->jobPost->id,
        ];
    }
}
