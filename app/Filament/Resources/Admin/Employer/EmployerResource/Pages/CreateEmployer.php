<?php

namespace App\Filament\Resources\Admin\Employer\EmployerResource\Pages;

use App\Filament\Resources\Admin\Employer\EmployerResource;
use App\Models\Address;
use App\Models\User;
use Database\Seeders\RegisterEmployerPermissionsSeeder;
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
        //    dd($data);
        $existingUser = User::where('email', $data['user']['email'])->first();
        if (!$existingUser) {
            $user = User::create([
                'name' => $data['user']['name'],
                'email' => $data['user']['email'],
                'phone' => $data['user']['phone'],
                'role' => 'employer',
                'password' => Hash::make($data['user']['password']),
                'image' => $data['user']['image'] ?? null,
                'email_verified_at' => $data['user']['email_verified_at'] ?? null,
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

            $data['address_id'] = $address->id;
        }

        $data['user_id'] = $user->id;

        // Chạy seeder AssignEmployerPermissionsSeeder
        // Phân quyền Employer cho người dùng vừa đăng ký
        (new RegisterEmployerPermissionsSeeder())->run($user->id);

        return $data;
    }

}
