<?php

namespace App\Filament\Resources\JobPostPackage\JobPostPackageResource\Pages;

use App\Filament\Resources\JobPostPackage\JobPostPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJobPostPackages extends ListRecords
{
    protected static string $resource = JobPostPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
