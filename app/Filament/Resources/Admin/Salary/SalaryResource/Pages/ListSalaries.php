<?php

namespace App\Filament\Resources\Admin\Salary\SalaryResource\Pages;

use App\Filament\Resources\Admin\Salary\SalaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSalaries extends ListRecords
{
    protected static string $resource = SalaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
