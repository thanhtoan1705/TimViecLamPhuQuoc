<?php

namespace App\Filament\Resources\Employer\Event\EventResource\Pages;

use App\Filament\Resources\Employer\Event\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

}
