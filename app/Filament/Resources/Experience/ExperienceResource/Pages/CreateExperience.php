<?php

namespace App\Filament\Resources\Experience\ExperienceResource\Pages;

use App\Filament\Resources\Experience\ExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExperience extends CreateRecord
{
    protected static string $resource = ExperienceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
