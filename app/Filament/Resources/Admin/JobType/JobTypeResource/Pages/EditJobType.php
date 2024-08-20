<?php

namespace App\Filament\Resources\Admin\JobType\JobTypeResource\Pages;

use App\Filament\Resources\Admin\JobType\JobTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobType extends EditRecord
{
    protected static string $resource = JobTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
