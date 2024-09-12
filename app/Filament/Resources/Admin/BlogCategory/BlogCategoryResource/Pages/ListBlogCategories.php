<?php

namespace App\Filament\Resources\Admin\BlogCategory\BlogCategoryResource\Pages;

use App\Filament\Resources\Admin\BlogCategory\BlogCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListBlogCategories extends ListRecords
{
    protected static string $resource = BlogCategoryResource::class;

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
