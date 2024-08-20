<?php

namespace App\Filament\Resources\Admin\Comment\CommentResource\Pages;

use App\Filament\Resources\Admin\Comment\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComment extends EditRecord
{
    protected static string $resource = CommentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
