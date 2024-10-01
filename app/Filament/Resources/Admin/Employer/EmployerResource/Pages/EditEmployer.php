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
        if (!empty($data['user']['password'])) {
            $user->password = Hash::make($data['user']['password']);
        }
        $user->save();

        $address = $employer->address;
        if ($address) {
            $address->province_id = $data['province_id'];
            $address->district_id = $data['district_id'];
            $address->ward_id = $data['ward_id'];
            $address->street = $data['street'];
            $address->save();
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

        if ($address) {
            $data['province_id'] = $address->province_id;
            $data['district_id'] = $address->district_id;
            $data['ward_id'] = $address->ward_id;
            $data['street'] = $address->street;
        }

        return $data;
    }


}
