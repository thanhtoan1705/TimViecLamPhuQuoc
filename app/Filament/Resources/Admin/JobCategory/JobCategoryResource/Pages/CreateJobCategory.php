<?php

namespace App\Filament\Resources\Admin\JobCategory\JobCategoryResource\Pages;

use App\Filament\Resources\Admin\JobCategory\JobCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJobCategory extends CreateRecord
{
    protected static string $resource = JobCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
