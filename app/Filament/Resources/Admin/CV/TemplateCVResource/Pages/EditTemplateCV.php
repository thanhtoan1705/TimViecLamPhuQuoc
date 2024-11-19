<?php

namespace App\Filament\Resources\Admin\CV\TemplateCVResource\Pages;

use App\Filament\Resources\Admin\CV\TemplateCVResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTemplateCV extends EditRecord
{
    protected static string $resource = TemplateCVResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
