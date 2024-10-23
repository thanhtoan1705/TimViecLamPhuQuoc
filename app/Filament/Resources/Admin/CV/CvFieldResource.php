<?php

namespace App\Filament\Resources\Admin\CV;

use App\Filament\Resources\Admin\CV\CvFieldResource\Pages;
use App\Filament\Resources\Admin\CV\CvFieldResource\RelationManagers;
use App\Models\CvField;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CvFieldResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = CvField::class;

    protected static ?string $navigationIcon = 'heroicon-o-pause';

    protected static ?string $navigationLabel = 'Trường CV';

    protected static ?string $modelLabel = 'Trường CV';

    protected static ?string $navigationGroup = 'CV';

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
                Select::make('template_id')
                    ->relationship('template', 'template_name')
                    ->label('Mẫu CV')
                    ->required(), // Đánh dấu trường là bắt buộc

                Forms\Components\Repeater::make('cv_fields')
                    ->label('Các trường CV')
                    ->schema([
                        TextInput::make('fields_name')
                            ->required()
                            ->label('Tên trường'),

                        Select::make('fields_type')
                            ->options([
                                'text' => 'Text',
                                'email' => 'Email',
                                'date' => 'Date',
                                'textarea' => 'Textarea',
                            ])
                            ->required()
                            ->label('Loại trường'),
                    ])
                    ->itemLabel('Thêm trường'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fields_name')->label('Tên trường'),
                Tables\Columns\TextColumn::make('fields_type')->label('Loại trường'),
                Tables\Columns\TextColumn::make('template.template_name')->label('Mẫu CV'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCvFields::route('/'),
            'create' => Pages\CreateCvField::route('/create'),
            'edit' => Pages\EditCvField::route('/{record}/edit'),
        ];
    }
}
