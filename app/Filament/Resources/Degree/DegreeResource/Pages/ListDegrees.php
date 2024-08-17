<?php

namespace App\Filament\Resources\Degree\DegreeResource\Pages;

use App\Filament\Resources\Degree\DegreeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDegrees extends ListRecords
{
    protected static string $resource = DegreeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
