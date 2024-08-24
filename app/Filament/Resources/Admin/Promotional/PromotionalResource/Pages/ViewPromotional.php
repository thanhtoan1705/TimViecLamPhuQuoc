<?php

namespace App\Filament\Resources\Admin\Promotional\PromotionalResource\Pages;

use App\Filament\Resources\Admin\Promotional\PromotionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPromotional extends ViewRecord
{
    protected static string $resource = PromotionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
