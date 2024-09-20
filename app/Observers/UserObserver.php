<?php

namespace App\Observers;

use App\Models\User;
use Filament\Notifications\Notification;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        // Lấy tất cả người dùng có vai trò admin
        $adminUsers = User::where('role', 'admin')->get();

        // Kiểm tra xem tài khoản là Candidate hay Employer
        if ($user->role === 'candidate') {
            Notification::make()
                ->title("Tài khoản ứng viên đã được tạo thành công")
                ->sendToDatabase($user)
                ->success();

            foreach ($adminUsers as $admin) {
                Notification::make()
                    ->title("Người dùng ".$user->name . " vừa tạo tài khoản ứng viên")
                    ->sendToDatabase($admin)
                    ->success();
            }

        } elseif ($user->role === 'employer') {
            Notification::make()
                ->title("Tài khoản nhà tuyển dụng đã được tạo thành công")
                ->sendToDatabase($user)
                ->success();

            // Gửi thông báo cho tất cả người dùng admin
            foreach ($adminUsers as $admin) {
                Notification::make()
                    ->title("Người dùng ".$user->name . " vừa tạo tài khoản nhà tuyển dụng")
                    ->sendToDatabase($admin)
                    ->success();
            }
        }

    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {

    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
