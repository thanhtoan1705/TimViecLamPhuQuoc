<?php

namespace App\Filament\Resources\UserJobPackage\UserJobPackageResource\Pages;

use App\Filament\Resources\UserJobPackage\UserJobPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUserJobPackages extends ListRecords
{
    protected static string $resource = UserJobPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}