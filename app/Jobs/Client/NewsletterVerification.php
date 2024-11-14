<?php

namespace App\Jobs\Client;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterVerificationMail;

class NewsletterVerification implements ShouldQueue
{
    use Queueable;
    public $verificationToken;
    public $email;

    /**
     * Create a new job instance.
     */
    public function __construct($verificationToken, $email)
    {
        $this->verificationToken = $verificationToken;
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new NewsletterVerificationMail($this->verificationToken, $this->email));
    }
}
