<?php

namespace App\Mail;

use App\Models\Interview;
use App\Models\Candidate;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InterviewReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $interview;
    public $candidate;

    public function __construct(Interview $interview, Candidate $candidate)
    {
        $this->interview = $interview;
        $this->candidate = $candidate;
    }

    public function build()
    {
        return $this->markdown('emails.interviews.reminder')
            ->subject('Nhắc nhở: Lịch phỏng vấn sắp diễn ra');
    }
}

