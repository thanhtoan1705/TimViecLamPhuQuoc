<?php

namespace App\Filament\Resources\BlogCategory\BlogCategoryResource\Pages;

use App\Filament\Resources\BlogCategory\BlogCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogCategories extends ListRecords
{
    protected static string $resource = BlogCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
