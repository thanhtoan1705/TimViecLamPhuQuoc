<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Danh sách các commands cho application.
     *
     * @var array
     */
    // protected $commands = [
    //     Commands\TestZaloMessage::class,
    //     Commands\SendInterviewReminders::class,
    // ];

    /**
     * Đăng ký các lệnh Artisan.
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Định nghĩa lịch trình lệnh.
     */
    protected function schedule(Schedule $schedule)
    {
        // Lệnh gửi nhắc nhở package hết hạn
        $schedule->command('notify:package-expiry')
            ->dailyAt('00:00');

        // Lệnh gửi nhắc nhở phỏng vấn (email + zalo)
        $schedule->command('interviews:send-reminders')
            ->everyMinute()
            ->withoutOverlapping()
            ->appendOutputTo(storage_path('logs/interview-reminders.log'));
    }
}
