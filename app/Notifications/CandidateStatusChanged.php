<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CandidateStatusChanged extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $record;

    public function __construct($record)
    {
        $this->record = $record;
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
            ->subject('Cập nhật tình trạng hồ sơ')
            ->line('Tình trạng hồ sơ của bạn đã được cập nhật.')
            ->line('Tình trạng mới: ' . $this->getStatusLabel())
            ->action('Xem chi tiết', url('/candidate/status'))
            ->line('Cảm ơn bạn đã ứng tuyển!');
    }

    private function getStatusLabel()
    {
        $statusOptions = [
            '1' => 'Phỏng vấn',
            '2' => 'Trúng tuyển',
            '3' => 'Từ chối',
        ];

        return $statusOptions[$this->record->status] ?? 'Chưa xác định';
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $statusLabel = $this->getStatusLabel();
        $message = "Nhà tuyển dụng " . $this->record->jobpost->employer->company_name . " đã " . strtolower($statusLabel) . " hồ sơ của bạn.";

        return [
            'status' => $this->record->status,
            'candidate_name' => $this->record->candidate->user->name,
            'message' => $message,
        ];
    }
}
