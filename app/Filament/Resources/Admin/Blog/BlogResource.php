<?php

namespace App\Filament\Resources\Admin\Blog;

use App\Filament\Resources\Blog\BlogResource\Pages;
use App\Filament\Resources\Blog\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Quản lý bài viết';

    protected static ?string $modelLabel = 'Bài viết';

    protected static ?string $navigationGroup = 'Bài viết';

    protected static ?int $navigationSort = 2; // xếp thứ tự

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'primary';
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        // Gán user_id cho người dùng đang đăng nhập
        $data['user_id'] = auth()->id();
        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        // Gán user_id cho người dùng đang đăng nhập
        if (auth()->check()) {
            $data['user_id'] = auth()->id();
        }
        return $data;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema(components: [
                        Grid::make(columns: 2)->schema([
                            Section::make('Thông tin bài viết')
                                ->schema([
                                    Grid::make(2)->schema([
                                        TextInput::make('title')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                                if ($operation === 'create' || 'update') {
                                                    $slug = Str::slug($state);
                                                    $set('slug', $slug);
                                                }
                                            })
                                            ->label('Tiêu đề bài viết')
                                            ->placeholder('Nhập tiêu đề bài viết')
                                            ->columnSpan(1),

                                        TextInput::make('slug')
                                            ->required()
                                            ->dehydrated()
                                            ->unique(Blog::class, 'slug', ignoreRecord: true)
                                            ->maxLength(255)
                                            ->label('Đường dẫn')
                                            ->placeholder('Nhập đường dẫn')
                                            ->columnSpan(1),

                                        MarkdownEditor::make('content')
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
                                            ->maxLength(65535)
                                            ->columnSpan(2),
                                        Section::make('Hình ảnh')
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->label('Nhập ảnh .png, .jpg, .jpeg')
                                                    ->image()
                                                    ->required()
                                                    ->columnSpan(2),
                                            ]),
                                        Section::make('SEO')
                                            ->schema([
                                                Grid::make(2)->schema([
                                                    TextInput::make('meta_title')
                                                        ->label('Meta title')
                                                        ->maxLength(255)
                                                        ->placeholder('Nhập thẻ meta tiêu đề')
                                                        ->columnSpan(1),

                                                    TextInput::make('meta_description')
                                                        ->label('Meta description')
                                                        ->maxLength(255)
                                                        ->placeholder('Nhập thẻ meta mô tả')
                                                        ->columnSpan(1),

                                                    TextInput::make('meta_keyword')
                                                        ->label('Meta keyword')
                                                        ->maxLength(255)
                                                        ->placeholder('Nhập thẻ meta từ khóa'),
                                                ]),
                                            ]),
                                    ]),
                                ])
                        ])->columnSpan(2),

                        Grid::make(1)->schema([
                            Section::make('Đăng')
                                ->schema([
                                    DatePicker::make('published_at')
                                        ->label('Ngày đăng')
                                        ->required()
                                        ->rules([
                                            'after_or_equal:' . now()->toDateString()
                                        ])
                                        ->helperText('Ngày đăng không được nhỏ hơn ngày hiện tại.'),

                                    Section::make('Chuyên mục')
                                        ->schema([
                                            Select::make('category_id')
                                                ->relationship('category', 'name')
                                                ->label('Chuyên mục bài viết')
                                                ->required(),
                                        ]),

                                    Hidden::make('user_id')
                                        ->default(auth()->id()),

                                    Section::make('Trạng thái')
                                        ->schema([
                                            Toggle::make('is_publish')
                                                ->label('Hiển thị')
                                                ->default(true),
                                        ]),
                                ])
                        ])->columnSpan(1),
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

                Tables\Columns\TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->searchable(),

                ImageColumn::make('image')->label('Hình ảnh'),

                Tables\Columns\TextColumn::make('slug')->label('Đường dẫn')->searchable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Chuyên mục')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày đăng')
                    ->dateTime('d/m/Y'),

                IconColumn::make('is_publish')
                    ->label('Công khai')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
            ])
            ->filters([
                Filter::make('title')
                    ->label('Lọc theo tên')
                    ->query(fn(Builder $query, array $data) => $query->where('title', 'like', '%' . $data['value'] . '%'))
                    ->form([
                        TextInput::make('value')
                            ->label('Tiêu đề bài viết')
                            ->placeholder('Nhập tiêu đề bài viết để lọc...')
                    ]),
                Filter::make('user_id')
                    ->label('Lọc theo tên')
                    ->query(fn(Builder $query, array $data) => $query->whereHas('user', fn($q) => $q->where('name', 'like', '%' . $data['value'] . '%')))
                    ->form([
                        TextInput::make('value')
                            ->label('Tên người dùng')
                            ->placeholder('Nhập tên để lọc...')
                    ]),
                Filter::make('blog_id')
                    ->label('Lọc theo danh mục bài viết')
                    ->query(fn(Builder $query, array $data) => $query->whereHas('category', fn($q) => $q->where('name', 'like', '%' . $data['value'] . '%')))
                    ->form([
                        TextInput::make('value')
                            ->label('Danh mục bài viết')
                            ->placeholder('Nhập danh mục để lọc...')
                    ]),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
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
            'index' => \App\Filament\Resources\Admin\Blog\BlogResource\Pages\ListBlogs::route('/'),
            'create' => \App\Filament\Resources\Admin\Blog\BlogResource\Pages\CreateBlog::route('/create'),
            'edit' => \App\Filament\Resources\Admin\Blog\BlogResource\Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
