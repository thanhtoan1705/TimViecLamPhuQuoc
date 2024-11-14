<?php

namespace App\Jobs\Client;

use App\Mail\NewsletterSubscribeNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class NewBlogPostNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $post;
    public $email;

    public function __construct($post, $email)
    {
        $this->post = $post;
        $this->email = $email;
    }

    public function handle()
    {
        Mail::to($this->email)->send(new NewsletterSubscribeNotification($this->post));
    }
}

