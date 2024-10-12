<?php

namespace App\Filament\Resources\Admin\CV\CvTemplateResource\Pages;

use App\Filament\Resources\Admin\CV\CvTemplateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCvTemplates extends ListRecords
{
    protected static string $resource = CvTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
