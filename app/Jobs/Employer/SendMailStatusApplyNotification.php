<?php

namespace App\Jobs\Employer;

use App\Mail\Employer\SendMailStatusApply;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendMailStatusApplyNotification implements ShouldQueue
{
    use Queueable;
    protected $email;
    protected $subject;
    protected $content;
    protected $profileStatus;
    protected $interviewDate;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $subject, $content, $profileStatus, $interviewDate)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->content = $content;
        $this->profileStatus = $profileStatus;
        $this->interviewDate = $interviewDate;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new SendMailStatusApply($this->subject, $this->content, $this->profileStatus, $this->interviewDate));
    }
}
