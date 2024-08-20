<?php

namespace App\Filament\Resources\Admin\BlogCategory\BlogCategoryResource\Pages;

use App\Filament\Resources\Admin\BlogCategory\BlogCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogCategory extends EditRecord
{
    protected static string $resource = BlogCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}