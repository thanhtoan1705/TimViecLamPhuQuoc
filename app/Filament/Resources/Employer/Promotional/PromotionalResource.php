<?php

namespace App\Filament\Resources\Employer\Promotional;

use App\Filament\Resources\Employer\Promotional\PromotionalResource\Pages;
use App\Filament\Resources\Employer\Promotional\PromotionalResource\RelationManagers;
use App\Models\Promotion;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PromotionalResource extends Resource
{
    protected static ?string $model = Promotion::class;

    protected static ?string $navigationLabel = 'Mã ưu đãi';

    protected static ?string $modelLabel = 'Mã ưu đãi';

    protected static ?string $navigationGroup = 'Mã ưu đãi';
    protected static ?string $navigationIcon = 'heroicon-o-ticket';

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
                //
            ])
            ->bulkActions([
                //
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
            'index' => Pages\CustomView::route('/'),
        ];
    }
}
