<?php

namespace App\Mail;

use App\Models\Interview;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmployerInterviewReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $interview;

    public function __construct(Interview $interview)
    {
        $this->interview = $interview;
    }

    public function build()
    {
        return $this->view('emails.interviews.employer-reminder')
            ->subject('Nhắc nhở: Bạn có lịch phỏng vấn sắp diễn ra');
    }
}
