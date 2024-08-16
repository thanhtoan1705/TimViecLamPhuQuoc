<?php

namespace App\Filament\Resources\Experience\ExperienceResource\Pages;

use App\Filament\Resources\Experience\ExperienceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExperience extends EditRecord
{
    protected static string $resource = ExperienceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
