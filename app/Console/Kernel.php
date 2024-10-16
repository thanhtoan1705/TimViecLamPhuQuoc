<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
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
        // Ví dụ: Lệnh này sẽ chạy mỗi ngày lúc 8 giờ sáng
        $schedule->command('notify:package-expiry')->dailyAt('00:00');
    }
}
