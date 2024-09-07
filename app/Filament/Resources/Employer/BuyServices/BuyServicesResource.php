<?php

namespace App\Filament\Resources\Employer\BuyServices;

use App\Filament\Resources\Employer\BuyServices\BuyServicesResource\Pages;
use App\Filament\Resources\Employer\BuyServices\BuyServicesResource\RelationManagers;
use App\Models\JobPostPackage;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class BuyServicesResource extends Resource
{
    protected static ?string $model = JobPostPackage::class;

    protected static ?string $navigationLabel = 'Mua gói đăng tin';
    protected static ?string $navigationGroup = 'Dịch vụ';
    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            ])
            ->filters([
            ])
            ->actions([
            ])
            ->bulkActions([
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\CustomView::route('/')
        ];
    }
}
