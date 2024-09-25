<?php

namespace App\Filament\Resources\Admin\Degree;

use App\Filament\Resources\Degree\DegreeResource\Pages;
use App\Models\Degree;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DegreeResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Degree::class;

    protected static ?string $navigationLabel = 'Bằng cấp';
    protected static ?string $modelLabel = 'Bằng cấp';
    protected static ?string $navigationGroup = 'Năng lực';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

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
                            Section::make('Thông tin bằng cấp')
                                ->schema([
                                    TextInput::make('name')
                                        ->required()
                                        ->maxLength(255)
                                        ->label('Tên bằng cấp'),
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
                Tables\Columns\TextColumn::make('name')->label('Bằng cấp')->searchable(),
            ])
            ->filters([
                Filter::make('name')
                    ->label('Lọc theo tên')
                    ->query(fn(Builder $query, array $data) => $query->where('name', 'like', '%' . $data['value'] . '%'))
                    ->form([
                        TextInput::make('value')
                            ->label('Tên bằng cấp')
                            ->placeholder('Nhập tên để lọc...')
                    ]),
            ])
            ->actions([
                ActionGroup::make([
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
            'index' => \App\Filament\Resources\Admin\Degree\DegreeResource\Pages\ListDegrees::route('/'),
            'create' => \App\Filament\Resources\Admin\Degree\DegreeResource\Pages\CreateDegree::route('/create'),
            'edit' => \App\Filament\Resources\Admin\Degree\DegreeResource\Pages\EditDegree::route('/{record}/edit'),
        ];
    }
}
