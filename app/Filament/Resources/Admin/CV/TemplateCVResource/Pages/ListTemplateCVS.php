<?php

namespace App\Filament\Resources\Admin\CV\TemplateCVResource\Pages;

use App\Filament\Resources\Admin\CV\TemplateCVResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTemplateCVS extends ListRecords
{
    protected static string $resource = TemplateCVResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
