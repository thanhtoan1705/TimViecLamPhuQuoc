<?php

namespace App\Filament\Resources\Admin\CV\CvFieldResource\Pages;

use App\Filament\Resources\Admin\CV\CvFieldResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCvFields extends ListRecords
{
    protected static string $resource = CvFieldResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
