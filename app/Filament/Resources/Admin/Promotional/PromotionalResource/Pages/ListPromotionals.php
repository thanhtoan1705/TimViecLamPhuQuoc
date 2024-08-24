<?php

namespace App\Filament\Resources\Admin\Promotional\PromotionalResource\Pages;

use App\Filament\Resources\Admin\Promotional\PromotionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPromotionals extends ListRecords
{
    protected static string $resource = PromotionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
