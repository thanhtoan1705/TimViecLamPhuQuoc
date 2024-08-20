<?php

namespace App\Filament\Resources\Admin\Blog\BlogResource\Pages;

use App\Filament\Resources\Admin\Blog\BlogResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
