<?php

namespace App\Filament\Resources\Admin\Salary;

use App\Filament\Resources\Admin\Salary\SalaryResource\Pages;
use App\Filament\Resources\Admin\Salary\SalaryResource\RelationManagers;
use App\Models\Salary;
use Filament\Forms;
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
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class SalaryResource extends Resource
{
    protected static ?string $model = Salary::class;

    protected static ?string $navigationLabel = 'Mức lương';

    protected static ?string $modelLabel = 'Mức lương';

    protected static ?string $navigationGroup = 'Năng lực';

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Grid::make(1)->schema([
                            Section::make('Thông tin lương')
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
                                        ->label('Tên lương')
                                        ->validationAttribute('tên lương')
                                        ->rules([
                                            'unique:salaries,name']),

                                    TextInput::make('slug')
                                        ->required()
                                        ->maxLength(255)
                                        ->dehydrated()
                                        ->label('Đường dẫn')
                                        ->rules([
                                            'unique:salaries,slug',
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
                Tables\Columns\TextColumn::make('name')->label('Mức lương')->searchable(),
                Tables\Columns\TextColumn::make('slug')->label('Đường dẫn')->searchable(),
            ])
            ->filters([
                Filter::make('name')
                    ->label('Lọc theo tên')
                    ->query(fn (Builder $query, array $data) => $query->where('name', 'like', '%' . $data['value'] . '%'))
                    ->form([
                        TextInput::make('value')
                            ->label('Mức lương')
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
            'index' => Pages\ListSalaries::route('/'),
            'create' => Pages\CreateSalary::route('/create'),
            'edit' => Pages\EditSalary::route('/{record}/edit'),
        ];
    }
}
