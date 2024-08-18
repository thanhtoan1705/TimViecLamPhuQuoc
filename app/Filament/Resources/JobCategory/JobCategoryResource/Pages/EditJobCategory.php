<?php

namespace App\Filament\Resources\JobCategory\JobCategoryResource\Pages;

use App\Filament\Resources\JobCategory\JobCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobCategory extends EditRecord
{
    protected static string $resource = JobCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
