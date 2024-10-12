<?php

namespace App\Filament\Resources\Admin\CV\CvTemplateResource\Pages;

use App\Filament\Resources\Admin\CV\CvTemplateResource;
use App\Models\CvTemplate;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCvTemplate extends EditRecord
{
    protected static string $resource = CvTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
