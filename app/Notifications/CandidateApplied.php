<?php

namespace App\Notifications;

use App\Models\Candidate;
use App\Models\JobPost;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CandidateApplied extends Notification
{
    use Queueable;

    protected $jobPost;
    protected $candidate;

    /**
     * Create a new notification instance.
     */
    public function __construct(JobPost $jobPost, Candidate $candidate)
    {
        $this->jobPost = $jobPost;
        $this->candidate = $candidate;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // Bạn có thể gửi qua nhiều kênh, ví dụ: ['database', 'mail']
        return ['database'];
    }

    /**
     * Nội dung thông báo khi gửi qua database
     */
    public function toDatabase($notifiable): array
    {
        return [
            'message' => "Có một ứng viên mới đã nộp CV cho vị trí: {$this->jobPost->title}",
            'job_post_id' => $this->jobPost->id,
            'candidate_id' => $this->candidate->id,
        ];


    }

    /**
     * Get the mail representation of the notification (nếu sử dụng kênh email).
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Ứng viên mới nộp CV')
            ->line('Có một ứng viên mới đã nộp CV.')
            ->action('Xem chi tiết', url("/job-posts/{$this->jobPost->id}"))
            ->line('Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        // Nếu bạn muốn lưu thông tin ở dạng mảng JSON
        return [
            'job_post_id' => $this->jobPost->id,
            'candidate_id' => $this->candidate->id,
        ];
    }
}
