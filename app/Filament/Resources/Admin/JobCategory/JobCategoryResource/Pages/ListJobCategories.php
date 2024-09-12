<?php

namespace App\Filament\Resources\Admin\JobCategory\JobCategoryResource\Pages;

use App\Filament\Resources\Admin\JobCategory\JobCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListJobCategories extends ListRecords
{
    protected static string $resource = JobCategoryResource::class;

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->orderBy('order');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
