<?php

namespace App\Filament\Resources\Admin\Candidate\CandidateResource\Pages;

use App\Filament\Resources\Admin\Candidate\CandidateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;

class EditCandidate extends EditRecord
{
    protected static string $resource = CandidateResource::class;

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
        $user->email = $data['user']['email'];
        $user->phone = $data['user']['phone'];
        $user->avatar_url = $data['user']['avatar_url'];
        $user->email_verified_at = $data['user']['email_verified_at'];

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
            ]);
        }

        return $data;
    }


    protected function mutateFormDataBeforeFill(array $data): array
    {
        $user = $this->record->user;
        $data['user']['name'] = $user->name;
        $data['user']['email'] = $user->email;
        $data['user']['phone'] = $user->phone;
//        $data['user']['password'] = $user->password;
        $data['user']['avatar_url'] = $user->avatar_url;
        $data['user']['email_verified_at'] = $user->email_verified_at;


        // Xử lý address
        $address = $this->record->address;
        if ($address) {
            $data['province_id'] = $address->province_id;
            $data['district_id'] = $address->district_id;
            $data['ward_id'] = $address->ward_id;
            $data['street'] = $address->street;


        }

        return $data;
    }

}
