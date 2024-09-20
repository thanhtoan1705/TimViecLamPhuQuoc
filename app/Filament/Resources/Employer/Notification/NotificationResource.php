<?php

namespace App\Filament\Resources\Employer\Notification;

use App\Filament\Resources\Employer\Notification\NotificationResource\Pages;
use App\Filament\Resources\Employer\Notification\NotificationResource\RelationManagers;
use App\Models\Notification;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NotificationResource extends Resource
{
    protected static ?string $model = Notification::class;

    protected static ?string $navigationLabel = 'Thông báo';

    protected static ?string $modelLabel = 'Thông báo';

    protected static ?string $navigationGroup = 'Thông báo';

    protected static ?string $navigationIcon = 'heroicon-o-bell';

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
            'index' => Pages\PageNotification::route('/'),
        ];
    }
}
