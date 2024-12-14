<?php

namespace App\Filament\Resources\Admin\Blog;

use App\Filament\Components\ImageUploadComponent;
use App\Filament\Resources\Blog\BlogResource\Pages;
use App\Filament\Resources\Blog\BlogResource\RelationManagers;
use App\Models\Blog;
use App\Models\BlogCategory;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Blog::class;

    protected static ?string $slug = 'blogs';

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
                                            ->rules([
                                                'min:2',
                                                function (\Filament\Forms\Get $get) {
                                                    return Rule::unique('blogs', 'title')->ignore($get('id'));
                                                }
                                            ])
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
                                            ->unique(Blog::class, 'slug', fn($record) => $record)
                                            ->maxLength(255)
                                            ->label('Đường dẫn')
                                            ->placeholder('Nhập đường dẫn')
                                            ->columnSpan(1),

                                        RichEditor::make('content')
                                            ->label('Nội dung bài viết')
                                            ->placeholder('Nhập nội dung bài viết...')
                                            ->required()
                                            ->columnSpan(2),
                                        Section::make('Hình ảnh')
                                            ->schema([
//
                                                ImageUploadComponent::make(
                                                    'image',
                                                    'title',
                                                    'bai-viet',
                                                    'images/blog',
                                                )
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
                                        ->minDate(fn () => request()->routeIs('filament.resources.blogs.create') ? Carbon::today() : null)
                                        ->afterStateUpdated(function ($state, callable $set) {
                                            $selectedDate = Carbon::parse($state);
                                            $today = Carbon::today();

                                            $isCreating = !request()->route('record');

                                            if ($isCreating && $selectedDate->lt($today)) {
                                                $set('published_at', null);
                                                Notification::make()
                                                    ->title('Ngày đăng phải lớn hơn hoặc bằng ngày hiện tại!')
                                                    ->danger()
                                                    ->send();
                                            }
                                        }),

                                    Placeholder::make('created_at')
                                        ->label('Thời gian tạo')
                                        ->content(fn($record) => $record ? $record->created_at->format('d/m/Y H:i:s') : '-'),

                                    Placeholder::make('updated_at')
                                        ->label('Thời gian cập nhật mới nhất')
                                        ->content(fn($record) => $record ? $record->updated_at->format('d/m/Y H:i:s') : '-'),

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
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),
                ImageColumn::make('image')->label('Hình ảnh'),

                Tables\Columns\TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->limit(30)
                    ->searchable(),

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
                Tables\Filters\SelectFilter::make('title')
                    ->label('Tên bài viết')
                    ->options(Blog::pluck('title', 'title')->toArray())
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('user_id')
                    ->label('Tác giả')
                    ->relationship('user', 'name', function (Builder $query) {
                        $query->where('role', 'admin');
                    })
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Danh mục')
                    ->relationship('category', 'name')
                    ->options(BlogCategory::pluck('name', 'id')->toArray())
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Action::make('view_live')
                        ->label('Xem thực tế') // Đổi nhãn thành "Xem thực tế"
                        ->url(fn ($record) => route('client.post.detail', $record->slug)) // Tạo URL dựa vào slug của công việc
                        ->icon('heroicon-o-link') // Thêm biểu tượng
                        ->openUrlInNewTab(), // Mở liên kết trong tab mới
                    Tables\Actions\ViewAction::make()
                        ->modalWidth('8xl'),
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
}
