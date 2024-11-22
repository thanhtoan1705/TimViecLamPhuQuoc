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

        // Xử lý user data
        $user = $employer->user;
        $user->name = $data['user']['name'];
        $user->phone = $data['user']['phone'];
        $user->email_verified_at = $data['user']['email_verified_at'] ?? null;
        if (!empty($data['user']['password'])) {
            $user->password = Hash::make($data['user']['password']);
        }
        $user->save();

        // Xử lý address data
        if (!$employer->address_id) {
            // Nếu chưa có address, tạo mới
            $address = new \App\Models\Address([
                'province_id' => $data['province_id'],
                'district_id' => $data['district_id'],
                'ward_id' => $data['ward_id'],
                'street' => $data['street'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
            ]);
            $address->save();

            // Cập nhật address_id cho employer
            $employer->address_id = $address->id;
            $employer->save();
        } else {
            // Nếu đã có address, cập nhật
            $address = $employer->address;
            $address->update([
                'province_id' => $data['province_id'],
                'district_id' => $data['district_id'],
                'ward_id' => $data['ward_id'],
                'street' => $data['street'],
                'latitude' => $data['latitude'],
                'longitude' => $data['longitude'],
            ]);
        }

        return $data;
    }



    protected function mutateFormDataBeforeFill(array $data): array
    {
        $employer = $this->record;
        $address = $employer->address;

        $user = $this->record->user;
        $data['user']['name'] = $user->name;
        $data['user']['email'] = $user->email;
        $data['user']['phone'] = $user->phone;
//        $data['user']['password'] = $user->password;
        $data['user']['image'] = $user->image;
        $data['user']['email_verified_at'] = $user->email_verified_at;

        if ($address) {
            $data['province_id'] = $address->province_id;
            $data['district_id'] = $address->district_id;
            $data['ward_id'] = $address->ward_id;
            $data['street'] = $address->street;
            $data['latitude'] = $address->latitude;
            $data['longitude'] = $address->longitude;

            // Lưu kinh độ và vĩ độ vào thuộc tính của lớp
            $this->latitude = $address->latitude;
            $this->longitude = $address->longitude;
        }

        return $data;
    }


}
