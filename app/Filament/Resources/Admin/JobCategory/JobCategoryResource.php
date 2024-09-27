<?php

namespace App\Filament\Resources\Admin\JobCategory;

use App\Filament\Resources\JobCategory\JobCategoryResource\Pages;
use App\Filament\Resources\JobCategory\JobCategoryResource\RelationManagers;
use App\Models\Job_category;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Filament\Forms\Components\Hidden;

class JobCategoryResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Job_category::class;

    protected static ?string $navigationLabel = 'Ngành nghề';

    protected static ?string $modelLabel = 'Ngành nghề';
    protected static ?string $navigationGroup = 'Công việc';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Grid::make(1)->schema([
                            Section::make('Danh mục công việc')
                                ->schema([
                                    TextInput::make('name')
                                        ->required()
                                        ->maxLength(255)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation
                                        === 'create' ? $set('slug', Str::slug($state)) : null)
                                        ->label('Tên danh mục'),
                                    TextInput::make('slug')
                                        ->required()
                                        ->dehydrated()
                                        ->unique(Job_category::class, 'slug', ignoreRecord: true)
                                        ->maxLength(255),
                                    Hidden::make('order')
                                        ->default(fn ($livewire) => $livewire->getModel()->id ?? 0),
                                    FileUpload::make('image')
                                        ->label('Hình ảnh')
                                        ->image()
                                        ->imageEditor()
                                        ->required()
                                        ->disk('public')
                                        ->directory('images/job-category')
                                        ->maxSize(1024 * 5)
                                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp']),
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
                Tables\Columns\TextColumn::make('slug')->label('Đường dẫn')->searchable(),
                ImageColumn::make('image')->label('Hình ảnh'),
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
//                    Tables\Actions\ViewAction::make(),
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
            'index' => \App\Filament\Resources\Admin\JobCategory\JobCategoryResource\Pages\ListJobCategories::route('/'),
            'create' => \App\Filament\Resources\Admin\JobCategory\JobCategoryResource\Pages\CreateJobCategory::route('/create'),
            'edit' => \App\Filament\Resources\Admin\JobCategory\JobCategoryResource\Pages\EditJobCategory::route('/{record}/edit'),
        ];
    }
}
