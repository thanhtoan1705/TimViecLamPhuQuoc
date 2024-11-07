<?php

namespace App\Mail\Client\Contact;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new content instance.
     */
    public $name;

    public $email;

    public $phone;
    public $content;

    /**
     * Khởi tạo instance mới của Mailable.
     */
    public function __construct($name, $phone, $email, $content)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->content = $content;
    }

    /**
     * Cấu hình tiêu đề email.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Yêu cầu hỗ trợ từ: ' . $this->name,
        );
    }

    /**
     * Xác định nội dung của email.
     */
    public function content(): Content
    {
        return new Content(
            view: 'vendor.mail.contact.contact',
            with: [
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'content' => $this->content,
            ]
        );
    }
}
