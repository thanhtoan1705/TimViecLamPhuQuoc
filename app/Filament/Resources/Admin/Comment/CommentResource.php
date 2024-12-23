<?php

namespace App\Filament\Resources\Admin\Comment;

use App\Filament\Resources\Comment\CommentResource\Pages;
use App\Filament\Resources\Comment\CommentResource\RelationManagers;
use App\Models\Comment;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class CommentResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = \App\Models\Comment::class;

    protected static ?string $slug = 'comments';

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $navigationLabel = 'Bình luận';

    protected static ?string $modelLabel = 'Bình luận';

    protected static ?string $navigationGroup = 'Bài viết';

    protected static ?int $navigationSort = 3;

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'primary';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Grid::make(1)->schema([
                            Section::make('Thông tin bình luận')
                                ->schema([
                                    Select::make('user_id')
                                        ->relationship('user', 'name')
                                        ->label('Người bình luận')
                                        ->searchable()
                                        ->required()
                                        ->placeholder('Chọn người bình luận'),

                                    Select::make('blog_id')
                                        ->relationship('blog', 'title')
                                        ->label('Tên bài viết')
                                        ->searchable()
                                        ->required()
                                        ->placeholder('Chọn bài viết'),
                                ])
                        ])->columnSpan(2),

                        Grid::make(1)->schema([
                            Section::make('Thời gian')
                                ->schema([
                                    Placeholder::make('created_at')
                                        ->label('Thời gian tạo')
                                        ->content(fn($record) => $record ? $record->created_at->format('d/m/Y H:i:s') : '-'),

                                    Placeholder::make('updated_at')
                                        ->label('Thời gian cập nhật mới nhất')
                                        ->content(fn($record) => $record ? $record->updated_at->format('d/m/Y H:i:s') : '-'),
                                ])
                        ])->columnSpan(1),

                        Grid::make(1)->schema([
                            Section::make()
                                ->schema([
                                    RichEditor::make('content')
                                        ->label('Nội dung bình luận')
                                        ->placeholder('Nhập nội dung bình luận...')
                                        ->toolbarButtons([
                                            'bold',
                                            'italic',
                                            'underline',
                                            'link',
                                            'bulletList',
                                            'numberList',
                                            'blockquote',
                                            'codeBlock',
                                            'code',
                                            'image',
                                            'media',
                                        ])
                                        ->required()
                                        ->maxLength(65535),
                                ])
                        ])->columnSpan(3),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Comment::orderBy('created_at', 'desc'))
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),
                Tables\Columns\TextColumn::make('user.name')->label('Người bình luận')->searchable(),
                Tables\Columns\TextColumn::make('blog.title')
                    ->label('Tên bài viết')
                    ->searchable()
                    ->wrap()
                    ->icon('heroicon-m-link')
                    ->limit(50)
                    ->url(fn($record) => route('client.post.detail', ['slug' => $record->blog->slug]) . '#comment-' . $record->id)
                    ->openUrlInNewTab(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Trạng thái')
                    ->getStateUsing(fn($record) => match($record->status) {
                        'unread' => 'Chưa xem',
                        'read' => 'Đã xem',
                        'replied' => 'Đã phản hồi',
                        default => 'Không xác định',
                    })
                    ->icon(function ($record) {
                        return match ($record->status) {
                            'read' => 'heroicon-o-eye',
                            'unread' => 'heroicon-o-eye-slash',
                            'replied' => 'heroicon-o-chat-bubble-left-right',
                            default => null,
                        };
                    })
                    ->colors([
                        'danger' => fn($record) => $record->status === 'unread',
                        'success' => fn($record) => $record->status === 'read',
                        'primary' => fn($record) => $record->status === 'replied',
                    ]),
            ])
            ->filters([
                Filter::make('user_id')
                    ->label('Lọc theo tên')
                    ->query(fn(Builder $query, array $data) => $query->whereHas('user', fn($q) => $q->where('name', 'like', '%' . $data['value'] . '%')))
                    ->form([
                        TextInput::make('value')
                            ->label('Tên người dùng')
                            ->placeholder('Nhập tên để lọc...')
                    ]),
                Filter::make('blog_id')
                    ->label('Lọc theo bài viết')
                    ->query(fn(Builder $query, array $data) => $query->whereHas('blog', fn($q) => $q->where('title', 'like', '%' . $data['value'] . '%')))
                    ->form([
                        TextInput::make('value')
                            ->label('Tiêu đề bài viết')
                            ->placeholder('Nhập tiêu đề để lọc...')
                    ]),
                Filter::make('status')
                    ->label('Lọc theo trạng thái')
                    ->query(fn(Builder $query, array $data) =>
                    isset($data['value']) && $data['value'] !== ''
                        ? $query->where('status', $data['value'])
                        : $query
                    )
                    ->form([
                        Select::make('value')
                            ->label('Trạng thái')
                            ->placeholder('Chọn trạng thái...')
                            ->options([
                                'unread' => 'Chưa xem',
                                'read' => 'Đã xem',
                                'replied' => 'Đã phản hồi',
                            ])
                    ]),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Action::make('reply')
                        ->label('Phản hồi')
                        ->icon('heroicon-o-chat-bubble-oval-left-ellipsis')
                        ->action(function ($record, array $data) {
                            // Tạo một bình luận mới (trả lời bình luận)
                            $newComment = $record->children()->create([
                                'blog_id' => $record->blog->id,
                                'content' => $data['content-reply'],
                                'parent_id' => $record->id,
                                'user_id' => auth()->id(),
//                                'commentable_id' => $record->commentable_id,
//                                'commentable_type' => $record->commentable_type,
                                'status' => 'read',
                            ]);
                            $record->update(['status' => 'replied']);
                            $userToNotify = $record->user; // Người bình luận gốc
                            $userToNotify->notify(new \App\Notifications\CommentReplyNotification($newComment));
                            Notification::make()
                                ->title('Đã gửi phản hồi')
                                ->success()
                                ->send();
                        })
                        ->form([
                            Textarea::make('content')
                                ->label(function ($record) {
                                    return 'Từ: ' . $record->user->name;
                                })
                                ->default(function ($record) {
                                    return strip_tags($record->content);
                                })
                                ->disabled(),

                            RichEditor::make('content-reply')
                                ->label('Nội dung')
                                ->required()
                                ->placeholder('Nhập nội dung...'),
                        ])
                        ->modalHeading('Trả lời bình luận')
                        ->modalButton('Gửi'),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\Admin\Comment\CommentResource\Pages\ListComments::route('/'),
            'create' => \App\Filament\Resources\Admin\Comment\CommentResource\Pages\CreateComment::route('/create'),
            'edit' => \App\Filament\Resources\Admin\Comment\CommentResource\Pages\EditComment::route('/{record}/edit'),
            'view' => \App\Filament\Resources\Admin\Comment\CommentResource\Pages\CommentDetail::route('/{record}'),
        ];
    }
}
