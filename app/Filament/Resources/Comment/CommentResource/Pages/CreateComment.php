<?php

namespace App\Filament\Resources\Comment\CommentResource\Pages;

use App\Filament\Resources\Comment\CommentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateComment extends CreateRecord
{
    protected static string $resource = CommentResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
