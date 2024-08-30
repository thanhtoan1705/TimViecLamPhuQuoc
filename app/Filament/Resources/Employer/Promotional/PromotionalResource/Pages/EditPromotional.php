<?php

namespace App\Filament\Resources\Employer\Promotional\PromotionalResource\Pages;

use App\Filament\Resources\Employer\Promotional\PromotionalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPromotional extends EditRecord
{
    protected static string $resource = PromotionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
