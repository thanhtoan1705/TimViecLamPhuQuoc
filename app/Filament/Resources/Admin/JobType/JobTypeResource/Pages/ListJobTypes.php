<?php

namespace App\Filament\Resources\Admin\JobType\JobTypeResource\Pages;

use App\Filament\Resources\Admin\JobType\JobTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJobTypes extends ListRecords
{
    protected static string $resource = JobTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
