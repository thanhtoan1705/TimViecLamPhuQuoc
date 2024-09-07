<?php

namespace App\Filament\Resources\Employer\ServiceTracking\ServiceTrackingResource\Pages;

use App\Filament\Resources\Employer\ServiceTracking\ServiceTrackingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceTrackings extends ListRecords
{
    protected static string $resource = ServiceTrackingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
