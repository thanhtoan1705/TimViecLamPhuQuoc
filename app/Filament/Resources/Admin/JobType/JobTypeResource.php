<?php

namespace App\Filament\Resources\Admin\JobType;

//use App\Filament\Resources\JobType\JobTypeResource\Pages;
//use App\Filament\Resources\JobType\JobTypeResource\RelationManagers;
use App\Models\JobType;
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
use Illuminate\Validation\Rule;

class JobTypeResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = JobType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Loại công việc';

    protected static ?string $modelLabel = 'Loại công việc';

    protected static ?string $navigationGroup = 'Công việc';

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
                            Section::make('Thông tin loại công việc')
                                ->schema([
                                    TextInput::make('name')
                                        ->required()
                                        ->rules([
                                            'min:2',
                                            'max:255',
                                            'regex:/^[\pL\pM\pN\s]+$/u',
                                            'unique:job_types,name',
                                            function (\Filament\Forms\Get $get) {
                                                return Rule::unique('job_types', 'name')->ignore($get('id'));
                                            }
                                        ])
                                        ->maxLength(255)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation
                                        === 'create' || 'update' ? $set('slug', Str::slug($state)) : null)
                                        ->label('Tên loại công việc'),
                                    TextInput::make('slug')
                                        ->required()
                                        ->dehydrated()
                                        ->unique(JobType::class, 'slug', ignoreRecord: true)
                                        ->maxLength(255),
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
                Tables\Columns\TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên loại công việc')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Đường dẫn')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Filter::make('name')
                    ->label('Lọc theo loại công việc')
                    ->query(fn(Builder $query, array $data) => $query->where('name', 'like', '%' . $data['value'] . '%'))
                    ->form([
                        TextInput::make('value')
                            ->label('Loại công việc')
                            ->placeholder('Nhập loại công việc để lọc...')
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
            'index' => \App\Filament\Resources\Admin\JobType\JobTypeResource\Pages\ListJobTypes::route('/'),
            'create' => \App\Filament\Resources\Admin\JobType\JobTypeResource\Pages\CreateJobType::route('/create'),
            'view' => \App\Filament\Resources\Admin\JobType\JobTypeResource\Pages\ViewJobType::route('/{record}'),
            'edit' => \App\Filament\Resources\Admin\JobType\JobTypeResource\Pages\EditJobType::route('/{record}/edit'),
        ];
    }
}
