<?php

namespace App\Filament\Resources\Employer\EmployerResource\Pages;

use App\Filament\Resources\Employer\EmployerResource;
use App\Models\Address;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;


class CreateEmployer extends CreateRecord
{
    protected static string $resource = EmployerResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $existingUser = User::where('email', $data['user']['email'])->first();
        if (!$existingUser) {
            $user = User::create([
                'name' => $data['user']['name'],
                'email' => $data['user']['email'],
                'phone' => $data['user']['phone'],
                'password' => Hash::make($data['user']['password']),
                'image' => $data['user']['image'] ?? null,
            ]);
        } else {
            $user = $existingUser;
        }

        // Lưu địa chỉ bằng tên
        $addressData = $data['address'] ?? [];
        if (!empty($addressData)) {
            $address = Address::create([
                'country' => $addressData['country'] ?? null,
                'province' => $addressData['province']['name'] ?? null,
                'district' => $addressData['district']['name'] ?? null,
                'ward' => $addressData['ward']['name'] ?? null,
                'street' => $addressData['street'] ?? null,
            ]);

            // Thêm ID địa chỉ vào dữ liệu người dùng nếu cần thiết
            $data['address_id'] = $address->id;
        }


        $data['user_id'] = $user->id;
        return $data;
    }


}
