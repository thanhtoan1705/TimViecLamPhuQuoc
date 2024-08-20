<?php

namespace App\Filament\Resources\Admin\Blog\BlogResource\Pages;

use App\Filament\Resources\Admin\Blog\BlogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
