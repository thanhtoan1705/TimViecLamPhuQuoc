<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PackageExpiryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $package;

    /**
     * Tạo instance mới cho email này.
     */
    public function __construct($package)
    {
        $this->package = $package;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Thông báo hết hạn gói dịch vụ')
            ->view('vendor.mail.package_expiry')
            ->with([
                'employerName' => $this->package->employer->user->name,
                'remainingDays' => 3, // Gói hết hạn trong 3 ngày nữa
                'expiryDate' => $this->package->expires_at,
            ]);
    }
}
