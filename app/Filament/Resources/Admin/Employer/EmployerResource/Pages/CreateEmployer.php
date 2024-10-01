<?php

namespace App\Filament\Resources\Admin\Employer\EmployerResource\Pages;

use App\Filament\Resources\Admin\Employer\EmployerResource;
use App\Models\Address;
use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\Models\Ward;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;


class CreateEmployer extends CreateRecord
{
    protected static string $resource = EmployerResource::class;
    public $latitude;
    public $longitude;


    protected $listeners = ['updateCoordinates'];

    public function updateCoordinates($lat, $lon)
    {
        $this->latitude = $lat;
        $this->longitude = $lon;
    }


    protected function mutateFormDataBeforeCreate(array $data): array
    {
//        dd($data);
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

        // Lưu địa chỉ
        $addressData = $data ?? [];
        if (!empty($addressData)) {
            $address = Address::create([
                'province_id' => $data['province_id'] ?? null,
                'district_id' => $data['district_id'] ?? null,
                'ward_id' => $data['ward_id'] ?? null,
                'street' => $data['street'] ?? null,
                'latitude' => $data['latitude'] ?? null,
                'longitude' => $data['longitude'] ?? null,
            ]);

            // Cập nhật ID địa chỉ vào employer
            $data['address_id'] = $address->id;
        }

        // Cập nhật ID người dùng vào employer
        $data['user_id'] = $user->id;

        return $data;
    }

}
