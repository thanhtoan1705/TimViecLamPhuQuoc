<?php

namespace App\Filament\Resources\Admin\Experience;

use App\Filament\Resources\Experience\ExperienceResource\Pages;
use App\Filament\Resources\Experience\ExperienceResource\RelationManagers;
use App\Models\Experience;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ExperienceResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Experience::class;

    protected static ?string $navigationLabel = 'Kinh nghiệm';

    protected static ?string $modelLabel = 'Kinh nghiệm';
    protected static ?string $navigationGroup = 'Năng lực';

    protected static ?string $navigationIcon = 'heroicon-o-scale';
    protected static ?string $recordTitleAttribute = 'name';

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
                            Section::make('Thông tin kinh nghiệm')
                                ->schema([
                                    TextInput::make('name')
                                        ->required()
                                        ->maxLength(255)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                            $slug = Str::slug($state);
                                            if ($operation === 'create' || $operation === 'update') {
                                                $set('slug', $slug);
                                            }
                                        })
                                        ->label('Tên kinh nghiệm')
                                        ->validationAttribute('tên kinh nghiệm')
                                        ->rules([
                                            'unique:experiences,name']),

                                    TextInput::make('slug')
                                        ->required()
                                        ->maxLength(255)
                                        ->dehydrated()
                                        ->label('Đường dẫn')
                                        ->rules([
                                            'regex:/^[a-zA-Z0-9\-]+$/u',
                                            'unique:experiences,slug',
                                        ]),
                                ])
                        ])->columnSpan(2),

                        Grid::make(1)->schema([
                            Section::make()
                                ->schema([
                                    Placeholder::make('created_at')
                                        ->label('Thời gian tạo')
                                        ->content(fn ($record) => $record ? $record->created_at->format('d/m/Y H:i:s') : '-'),

                                    Placeholder::make('updated_at')
                                        ->label('Thời gian cập nhật mới nhất')
                                        ->content(fn ($record) => $record ? $record->updated_at->format('d/m/Y H:i:s') : '-'),
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
                    ->getStateUsing(fn ($rowLoop) => $rowLoop->index + 1),
                Tables\Columns\TextColumn::make('name')->label('Kinh nghiệm')->searchable(),
                Tables\Columns\TextColumn::make('slug')->label('Đường dẫn')->searchable(),
            ])
            ->filters([
                Filter::make('name')
                    ->label('Lọc theo tên')
                    ->query(fn (Builder $query, array $data) => $query->where('name', 'like', '%' . $data['value'] . '%'))
                    ->form([
                        TextInput::make('value')
                            ->label('Tên kinh nghiệm')
                            ->placeholder('Nhập tên để lọc...')
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
            'index' => \App\Filament\Resources\Admin\Experience\ExperienceResource\Pages\ListExperiences::route('/'),
            'create' => \App\Filament\Resources\Admin\Experience\ExperienceResource\Pages\CreateExperience::route('/create'),
            'edit' => \App\Filament\Resources\Admin\Experience\ExperienceResource\Pages\EditExperience::route('/{record}/edit'),
        ];
    }
}
