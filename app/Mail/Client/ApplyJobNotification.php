<?php

namespace App\Mail\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplyJobNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $employer;
    public $job;
    public $filePath;
    public $candidate;

    /**
     * Create a new message instance.
     */
    public function __construct($employer, $candidate, $job, $filePath)
    {
        $this->employer = $employer;
        $this->job = $job;
        $this->filePath = $filePath;
        $this->candidate = $candidate;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ứng tuyển '. $this->job->title . '-' . $this->candidate->user->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'vendor.mail.job-application-notification',
            with: [
                'employer' => $this->employer,
                'candidate' => $this->candidate,
                'job' => $this->job,
                'filePath' => $this->filePath,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromPath(path: storage_path('app/public/' . $this->filePath)),
        ];
    }
}
