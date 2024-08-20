<?php

namespace App\Filament\Resources\Admin\Experience\ExperienceResource\Pages;

use App\Filament\Resources\Admin\Experience\ExperienceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateExperience extends CreateRecord
{
    protected static string $resource = ExperienceResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
