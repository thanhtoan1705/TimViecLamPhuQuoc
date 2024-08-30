<?php

namespace App\Filament\Resources\Admin\Employer\EmployerResource\Pages;

use App\Filament\Resources\Admin\Employer\EmployerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditEmployer extends EditRecord
{
    protected static string $resource = EmployerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $employer = $this->record;

        $user = $employer->user;
        $user->name = $data['user']['name'];
        $user->phone = $data['user']['phone'];
        $user->image = $data['user']['image'];

        // Kiểm tra và chỉ cập nhật email nếu khác và không trống
        if (!empty($data['user']['email']) && $data['user']['email'] !== $user->email) {
            $user->email = $data['user']['email'];
        }

        if (!empty($data['user']['password'])) {
            $user->password = Hash::make($data['user']['password']);
        }


        $user->save();

        return $data;
    }


    protected function mutateFormDataBeforeFill(array $data): array
    {
        $user = $this->record->user;
        $data['user']['name'] = $user->name;
        $data['user']['email'] = $user->email;
        $data['user']['phone'] = $user->phone;
//        $data['user']['password'] = $user->password;
        $data['user']['image'] = $user->image;

        return $data;
    }


}
