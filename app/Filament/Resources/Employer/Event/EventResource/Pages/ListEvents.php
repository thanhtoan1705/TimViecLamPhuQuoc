<?php

namespace App\Filament\Resources\Employer\Event\EventResource\Pages;

use App\Filament\Employer\Widgets\CalendarWidget;
use App\Filament\Resources\Employer\Event\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEvents extends ListRecords
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
//            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            CalendarWidget::class
        ];
    }
}
