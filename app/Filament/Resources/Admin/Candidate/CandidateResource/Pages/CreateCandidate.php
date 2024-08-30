<?php

namespace App\Filament\Resources\Admin\Candidate\CandidateResource\Pages;

use App\Filament\Resources\Admin\Candidate\CandidateResource;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;

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
            ]);
        } else {
            $user = $existingUser;
        }


        $data['user_id'] = $user->id;
        return $data;
    }

}
