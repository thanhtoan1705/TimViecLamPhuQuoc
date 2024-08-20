<?php

namespace App\Filament\Resources\Admin\Experience\ExperienceResource\Pages;

use App\Filament\Resources\Admin\Experience\ExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExperiences extends ListRecords
{
    protected static string $resource = ExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
