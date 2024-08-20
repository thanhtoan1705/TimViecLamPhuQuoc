<?php

namespace App\Filament\Resources\Admin\JobCategory\JobCategoryResource\Pages;

use App\Filament\Resources\Admin\JobCategory\JobCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJobCategories extends ListRecords
{
    protected static string $resource = JobCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
