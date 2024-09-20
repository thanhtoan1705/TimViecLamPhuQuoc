<?php

namespace App\Filament\Resources\Employer\JobPost\JobPostResource\Pages;

use App\Filament\Resources\Employer\JobPost\JobPostResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Models\User;

class EditJobPost extends EditRecord
{
    protected static string $resource = JobPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }


    protected function beforeSave(): void
    {
        $jobPostTitle = $this->record->title;

        try {
            // Gửi thông báo cho người dùng hiện tại
            Notification::make()
                ->title("Cập nhật bài đăng: '{$jobPostTitle}' thành công")
                ->sendToDatabase(auth()->user())
                ->success();

            // Lấy tất cả người dùng có vai trò admin
            $adminUsers = User::where('role', 'admin')->get();

            // Gửi thông báo cho tất cả người dùng admin
            foreach ($adminUsers as $admin) {
                Notification::make()
                    ->title(auth()->user()->name . " vừa cập nhật bài đăng: '{$jobPostTitle}'")
                    ->sendToDatabase($admin)
                    ->success();
            }
        } catch (\Exception $e) {
            // Log lỗi hoặc xử lý lỗi theo yêu cầu
            \Log::error('Lỗi khi gửi thông báo: ' . $e->getMessage());

            // Bạn có thể hiển thị thông báo lỗi cho người dùng (nếu cần)
            Notification::make()
                ->title("Có lỗi xảy ra khi cập nhật bài đăng")
                ->danger()
                ->sendToDatabase(auth()->user());
        }
    }



}
