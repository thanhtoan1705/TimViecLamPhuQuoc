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
            Actions\ViewAction::make('view_live')
                ->label('Xem thực tế')
                ->url(fn ($record) => route('client.post.detail', $record->slug)) // Tạo URL dựa vào slug của công việc
                ->icon('heroicon-o-link')
                ->openUrlInNewTab()
                ->color('primary'),
        ];
    }
}
