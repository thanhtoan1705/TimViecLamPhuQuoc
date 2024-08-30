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
        $data['user']['avatar_url'] = $user->avatar_url;

        return $data;
    }

}
