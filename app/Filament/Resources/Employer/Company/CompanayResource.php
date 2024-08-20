<?php

namespace App\Filament\Resources\Employer\Company;

use App\Filament\Resources\Employer\Company\CompanayResource\Pages;
use App\Filament\Resources\Employer\Company\CompanayResource\RelationManagers;
use App\Models\Employer;
use App\Models\Employer\Company\Companay;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanayResource extends Resource
{
    protected static ?string $model = Employer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListCompanays::route('/'),
            'create' => Pages\CreateCompanay::route('/create'),
            'edit' => Pages\EditCompanay::route('/{record}/edit'),
        ];
    }
}
