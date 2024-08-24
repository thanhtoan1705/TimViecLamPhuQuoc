<?php

namespace App\Filament\Resources\Admin\CompanyType\CompanyTypeResource\Pages;

use App\Filament\Resources\Admin\CompanyType\CompanyTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyTypes extends ListRecords
{
    protected static string $resource = CompanyTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
