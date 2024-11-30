<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Interview;

class InterviewInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $interview;
    public $emailSubject;
    public $additionalContent;

    public function __construct(Interview $interview, string $subject, string $additionalContent)
    {
        $this->interview = $interview;
        $this->emailSubject = $subject;
        $this->additionalContent = $additionalContent;
    }

    public function build()
    {
        return $this->markdown('emails.interviews.invitation')
            ->subject($this->emailSubject)
            ->with([
                'settings' => \App\Models\SiteSetting::first(),
                'subject' => $this->emailSubject,
                'additionalContent' => $this->additionalContent
            ])
            ->priority(1);
    }
}
