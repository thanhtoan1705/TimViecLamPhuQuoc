<?php

namespace App\Filament\Resources\Admin\JobType\JobTypeResource\Pages;

use App\Filament\Resources\Admin\JobType\JobTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJobType extends CreateRecord
{
    protected static string $resource = JobTypeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
