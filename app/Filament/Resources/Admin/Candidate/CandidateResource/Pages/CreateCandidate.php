<?php

namespace App\Filament\Resources\Admin\Candidate\CandidateResource\Pages;

use App\Filament\Resources\Admin\Candidate\CandidateResource;
use App\Models\Address;
use App\Models\Candidate;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateCandidate extends CreateRecord
{
    protected static string $resource = CandidateResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $existingUser = User::where('email', $data['user']['email'])->first();
        if (!$existingUser) {
            $user = User::create([
                'name' => $data['user']['name'],
                'email' => $data['user']['email'],
                'phone' => $data['user']['phone'],
//                'password' => Hash::make($data['user']['password']),
                'password' => $data['user']['password'],
                'avatar_url' => $data['user']['avatar_url'] ?? null,
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
            ]);

            $data['address_id'] = $address->id;
        }


        $data['user_id'] = $user->id;

        $maxId = Candidate::max('id');
        $id = $maxId + 1;

        // Tạo slug trước khi tạo bản ghi mới
        $data['slug'] = Str::slug($data['user']['name'] .'-'. $id);

        return $data;
    }

}
