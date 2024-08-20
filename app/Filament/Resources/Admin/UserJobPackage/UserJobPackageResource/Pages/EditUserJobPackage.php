<?php

namespace App\Filament\Resources\Admin\UserJobPackage\UserJobPackageResource\Pages;

use App\Filament\Resources\Admin\UserJobPackage\UserJobPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserJobPackage extends EditRecord
{
    protected static string $resource = UserJobPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
