<?php

namespace App\Filament\Resources\Admin\Employer\EmployerResource\Pages;

use App\Filament\Resources\Admin\Employer\EmployerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEmployers extends ListRecords
{
    protected static string $resource = EmployerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
