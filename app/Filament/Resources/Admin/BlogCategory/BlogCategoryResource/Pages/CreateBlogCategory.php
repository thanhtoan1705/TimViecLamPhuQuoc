<?php

namespace App\Filament\Resources\Admin\BlogCategory\BlogCategoryResource\Pages;

use App\Filament\Resources\Admin\BlogCategory\BlogCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogCategory extends CreateRecord
{
    protected static string $resource = BlogCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
