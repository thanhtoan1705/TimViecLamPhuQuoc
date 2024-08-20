<?php

namespace App\Filament\Resources\Admin\Comment\CommentResource\Pages;

use App\Filament\Resources\Admin\Comment\CommentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
