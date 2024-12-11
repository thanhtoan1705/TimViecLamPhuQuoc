<?php

namespace App\Filament\Resources\Admin\Comment\CommentResource\Pages;

use App\Filament\Resources\Admin\Comment\CommentResource;
use Filament\Actions;
use App\Models\Comment;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\Page;

class CommentDetail extends Page
{
    protected static ?string $navigationLabel = 'Chi tiết bình luận';

    protected static ?string $modelLabel = 'Chi tiết bình luận';

    protected static string $resource = CommentResource::class;
    protected static string $view = 'filament.resources.comment.comment-detail';

    public $record;

    public function mount(Comment $record): void
    {
        $record->update(['status' => 'read']);
    }

    public function getTitle(): string
    {
        return __('Chi tiết bình luận');
    }

    public function getHeading(): string
    {
        return __('Chi tiết bình luận');
    }
}
