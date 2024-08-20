<?php

namespace App\Filament\Resources\Employer\Company\CompanayResource\Pages;

use App\Filament\Resources\Employer\Company\CompanayResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanay extends EditRecord
{
    protected static string $resource = CompanayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
