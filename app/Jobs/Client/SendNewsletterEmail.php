<?php

namespace App\Jobs\Client;

use App\Mail\NewsletterMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendNewsletterEmail implements ShouldQueue
{
    use Queueable;
    protected $email;
    protected $subject;
    protected $content;

    /**
     * Create a new job instance.
     */
    public function __construct($email, $subject, $content)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new NewsletterMail($this->subject, $this->content));
    }
}
