<?php

namespace App\Filament\Resources\Admin\Salary\SalaryResource\Pages;

use App\Filament\Resources\Admin\Salary\SalaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSalary extends EditRecord
{
    protected static string $resource = SalaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
