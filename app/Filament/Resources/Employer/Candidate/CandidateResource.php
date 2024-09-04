<?php

namespace App\Filament\Resources\Employer\Candidate;

use App\Filament\Resources\Employer\Candidate\CandidateResource\Pages;
use App\Filament\Resources\Employer\Candidate\CandidateResource\RelationManagers;
use App\Models\Candidate;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;


class CandidateResource extends Resource
{
    protected static ?string $model = Candidate::class;

    protected static ?string $navigationLabel = 'Gợi ý ứng viên';

    protected static ?string $modelLabel = 'Gợi ý ứng viên';

    protected static ?string $navigationGroup = 'Ứng viên';
    protected static ?string $navigationIcon = 'heroicon-o-ticket';

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
                Filter::make('newest')
                    ->label('Mới nhất')
                    ->query(fn(Builder $query) => $query->orderBy('created_at', 'desc')),

                Filter::make('oldest')
                    ->label('Cũ nhất')
                    ->query(fn(Builder $query) => $query->orderBy('created_at', 'asc')),
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
            'index' => Pages\CandidateSuggestion::route('/'),
        ];
    }
}
