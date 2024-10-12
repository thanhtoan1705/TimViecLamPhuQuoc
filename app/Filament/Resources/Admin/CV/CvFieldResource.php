<?php

namespace App\Filament\Resources\Admin\CV;

use App\Filament\Resources\Admin\CV\CvFieldResource\Pages;
use App\Filament\Resources\Admin\CV\CvFieldResource\RelationManagers;
use App\Models\CvField;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CvFieldResource extends Resource
{
    protected static ?string $model = CvField::class;

    protected static ?string $navigationIcon = 'heroicon-o-pause';

    protected static ?string $navigationLabel = 'Trường CV';

    protected static ?string $modelLabel = 'Trường CV';

    protected static ?string $navigationGroup = 'CV';
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
