<?php

namespace App\Filament\Resources\Admin\BlogCategory;

use App\Filament\Resources\BlogCategory\BlogCategoryResource\Pages;
use App\Filament\Resources\BlogCategory\BlogCategoryResource\RelationManagers;
use App\Models\BlogCategory;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
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
use Illuminate\Validation\Rule;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;

class BlogCategoryResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = BlogCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    protected static ?string $navigationLabel = 'Danh mục bài viết';

    protected static ?string $modelLabel = 'Danh mục bài viết';

    protected static ?string $navigationGroup = 'Bài viết';

    protected static ?int $navigationSort = 1;

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
                Grid::make(2)->schema([
                    Section::make('Thông tin danh mục')
                        ->schema([
                            Grid::make(2)->schema([
                                Grid::make(1)->schema([
                                    TextInput::make('name')
                                        ->required()
                                        ->maxLength(255)
                                        ->rules([
                                            'min:2',
                                            function (\Filament\Forms\Get $get) {
                                                return Rule::unique('blog_categories', 'name')->ignore($get('id'));
                                            }
                                        ])
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                            if ($operation === 'create' || $operation === 'update') {
                                                $slug = Str::slug($state);
                                                $set('slug', $slug);
                                            }
                                        })
                                        ->label('Tên danh mục'),

                                    FileUpload::make('image')
                                        ->label('Hình ảnh')
                                        ->image()
                                        ->imageEditor()
                                        ->required()
                                        ->disk('public')
                                        ->directory('images/blog-category')
                                        ->maxSize(1024 * 5)
                                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp']),
                                ])->columnSpan(1),

                                Grid::make(1)->schema([
                                    TextInput::make('slug')
                                        ->required()
                                        ->dehydrated()
                                        ->unique(BlogCategory::class, 'slug', ignoreRecord: true)
                                        ->maxLength(255)
                                        ->label('Đường dẫn'),

                                    Hidden::make('order')
                                        ->default(fn ($livewire) => $livewire->getModel()->id ?? 0),

                                    Section::make('Trạng thái')
                                        ->schema([
                                            Toggle::make('is_active')
                                                ->label('Hiển thị')
                                                ->onColor('success')
                                                ->offColor('danger')
                                                ->default(true),
                                        ]),
                                ])->columnSpan(1),
                            ]),
                        ])

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
                Tables\Columns\TextColumn::make('name')->label('Tên danh mục')->searchable(),
                ImageColumn::make('image')->label('Hình ảnh'),
                Tables\Columns\TextColumn::make('slug')->label('Đường dẫn')->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày đăng')
                    ->dateTime('d/m/Y'),
                IconColumn::make('is_active')
                    ->label('Công khai')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
            ])
            ->reorderable('order')
            ->filters([
                Filter::make('name')
                    ->label('Lọc theo tên')
                    ->query(fn(Builder $query, array $data) => $query->where('name', 'like', '%' . $data['value'] . '%'))
                    ->form([
                        TextInput::make('value')
                            ->label('Tên danh mục')
                            ->placeholder('Nhập tên để lọc...')
                    ]),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
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
            'index' => \App\Filament\Resources\Admin\BlogCategory\BlogCategoryResource\Pages\ListBlogCategories::route('/'),
            'create' => \App\Filament\Resources\Admin\BlogCategory\BlogCategoryResource\Pages\CreateBlogCategory::route('/create'),
            'edit' => \App\Filament\Resources\Admin\BlogCategory\BlogCategoryResource\Pages\EditBlogCategory::route('/{record}/edit'),
        ];
    }

    // Cac quyen tron phan quyen
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
