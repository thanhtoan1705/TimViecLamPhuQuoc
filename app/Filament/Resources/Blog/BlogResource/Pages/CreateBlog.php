<?php

namespace App\Filament\Resources\Blog\BlogResource\Pages;

use App\Filament\Resources\Blog\BlogResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
