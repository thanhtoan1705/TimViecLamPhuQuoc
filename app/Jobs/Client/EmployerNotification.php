<?php

namespace App\Jobs\Client;

use App\Mail\Client\ApplyJobNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;


class EmployerNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $employer;
    public $job;
    public $filePath;
    public $candidate;

    public function __construct($employer, $candidate, $job, $filePath)
    {
        $this->employer = $employer;
        $this->job = $job;
        $this->filePath = $filePath;
        $this->candidate = $candidate;
    }

    public function handle()
    {
        Mail::to($this->employer->user->email)->send(new ApplyJobNotification($this->employer, $this->candidate, $this->job, $this->filePath));
    }
}

