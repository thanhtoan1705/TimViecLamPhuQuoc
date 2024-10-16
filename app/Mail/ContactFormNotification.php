<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $messageContent;

    /**
     * Khởi tạo instance mới của Mailable.
     */
    public function __construct($name, $email, $messageContent)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messageContent = $messageContent;
    }

    /**
     * Cấu hình tiêu đề email.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Liên hệ từ: ' . $this->name,
        );
    }

    /**
     * Xác định nội dung của email.
     */
    public function content(): Content
    {
        return new Content(
            view: 'vendor.mail.contact',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'messageContent' => $this->messageContent,
            ]
        );
    }
}
