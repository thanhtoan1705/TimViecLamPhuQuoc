<?php

namespace App\Filament\Resources\Admin\Skill;

use App\Filament\Resources\Skill\SkillResource\Pages;
use App\Models\Skill;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;

    protected static ?string $navigationLabel = 'Kỹ năng';

    protected static ?string $modelLabel = 'Kỹ năng';
    protected static ?string $navigationGroup = 'Năng lực';

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Grid::make(1)->schema([
                            Section::make('Thông tin kỹ năng')
                                ->schema([
                                    TextInput::make('name')
                                        ->required()
                                        ->maxLength(255)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation
                                        === 'create' || 'update' ? $set('slug', Str::slug($state)) : null)
                                        ->label('Tên kỹ năng'),
                                    TextInput::make('slug')
                                        ->required()
                                        ->dehydrated()
                                        ->unique(Skill::class, 'slug', ignoreRecord: true)
                                        ->maxLength(255),
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
                Tables\Columns\TextColumn::make('name')->label('Kỹ năng')->searchable(),
                Tables\Columns\TextColumn::make('slug')->label('Đường dẫn')->searchable(),
            ])
            ->filters([
                Filter::make('name')
                    ->label('Lọc theo tên')
                    ->query(fn(Builder $query, array $data) => $query->where('name', 'like', '%' . $data['value'] . '%'))
                    ->form([
                        TextInput::make('value')
                            ->label('Tên kỹ năng')
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
            'index' => \App\Filament\Resources\Admin\Skill\SkillResource\Pages\ListSkills::route('/'),
            'create' => \App\Filament\Resources\Admin\Skill\SkillResource\Pages\CreateSkill::route('/create'),
            'edit' => \App\Filament\Resources\Admin\Skill\SkillResource\Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}
