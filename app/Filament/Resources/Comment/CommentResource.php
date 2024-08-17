<?php

namespace App\Filament\Resources\Comment;

use App\Filament\Resources\Comment\CommentResource\Pages;
use App\Filament\Resources\Comment\CommentResource\RelationManagers;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class CommentResource extends Resource
{
    protected static ?string $model = \App\Models\Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $navigationLabel = 'Bình luận';

    protected static ?string $modelLabel = 'Bình luận';

    protected static ?string $navigationGroup = 'Bài viết';

    protected static ?int $navigationSort = 3; // xếp thứ tự

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
                                        ->placeholder('Chọn người bình luận'),

                                    Select::make('blog_id')
                                        ->relationship('blog', 'title')
                                        ->label('Tên bài viết')
                                        ->searchable()
                                        ->placeholder('Chọn bài viết'),
                                ])
                        ])->columnSpan(2),

                        Grid::make(1)->schema([
                            Section::make()
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
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),
                Tables\Columns\TextColumn::make('user.name')->label('Người bình luận')->searchable(),
                Tables\Columns\TextColumn::make('blog.title')->label('Tên bài viết')->searchable()->wrap(),
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
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
//                    Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}