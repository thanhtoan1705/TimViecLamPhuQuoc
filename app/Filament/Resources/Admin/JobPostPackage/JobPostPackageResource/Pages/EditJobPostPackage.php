<?php

namespace App\Filament\Resources\Admin\JobPostPackage\JobPostPackageResource\Pages;

use App\Filament\Resources\Admin\JobPostPackage\JobPostPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobPostPackage extends EditRecord
{
    protected static string $resource = JobPostPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
