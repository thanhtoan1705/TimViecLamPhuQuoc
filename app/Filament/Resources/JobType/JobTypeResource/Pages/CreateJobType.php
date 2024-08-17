<?php

namespace App\Filament\Resources\JobType\JobTypeResource\Pages;

use App\Filament\Resources\JobType\JobTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJobType extends CreateRecord
{
    protected static string $resource = JobTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
