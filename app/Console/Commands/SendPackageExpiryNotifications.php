<?php

namespace App\Console\Commands;

use App\Mail\PackageExpiryNotification;
use App\Models\UserJobPackage;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPackageExpiryNotifications extends Command
{
    // Tên lệnh dùng để chạy command này
    protected $signature = 'notify:package-expiry';

    // Mô tả lệnh
    protected $description = 'Gửi email thông báo khi gói dịch vụ còn 3 ngày nữa hết hạn';

    /**
     * Thực thi lệnh.
     */
    public function handle()
    {
        // Lấy ngày hiện tại và ngày sau 3 ngày nữa
        $now = Carbon::now();
        $targetDate = $now->addDays(3);

        // Lấy các gói còn lại đúng 3 ngày nữa là hết hạn
        $packagesExpiringSoon = UserJobPackage::whereDate('expires_at', '=', $targetDate)->get();

        foreach ($packagesExpiringSoon as $package) {
            // Lấy thông tin nhà tuyển dụng
            $employer = $package->employer;

            // Gửi email thông báo
            Mail::to($employer->user->email)->send(new PackageExpiryNotification($package));
        }

        $this->info('Đã gửi thông báo hết hạn gói dịch vụ.');
    }
}
