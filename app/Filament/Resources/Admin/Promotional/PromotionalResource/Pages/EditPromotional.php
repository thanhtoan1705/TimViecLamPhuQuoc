<?php

namespace App\Filament\Resources\Admin\Promotional\PromotionalResource\Pages;

use App\Filament\Resources\Admin\Promotional\PromotionalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPromotional extends EditRecord
{
    protected static string $resource = PromotionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
