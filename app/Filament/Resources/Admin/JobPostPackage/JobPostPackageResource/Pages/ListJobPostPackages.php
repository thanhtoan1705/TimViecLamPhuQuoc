<?php

namespace App\Filament\Resources\Admin\JobPostPackage\JobPostPackageResource\Pages;

use App\Filament\Resources\Admin\JobPostPackage\JobPostPackageResource;
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
