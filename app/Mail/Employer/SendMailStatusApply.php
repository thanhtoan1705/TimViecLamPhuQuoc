<?php

namespace App\Mail\Employer;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMailStatusApply extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $content;

    public $profileStatus;
    public $interviewDate;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $content, $profileStatus, $interviewDate)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->profileStatus = $profileStatus;
        $this->interviewDate = $interviewDate;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'vendor.mail.employer.send-mail-status-apply',
            with: [
                'content' => $this->content,
                'subject' => $this->subject,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
