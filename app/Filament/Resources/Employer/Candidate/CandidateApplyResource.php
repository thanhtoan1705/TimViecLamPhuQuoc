<?php

namespace App\Filament\Resources\Employer\Candidate;

use App\Filament\Resources\Employer\Candidate\CandidateApplyResource\Pages;
use App\Filament\Resources\Employer\Candidate\CandidateApplyResource\RelationManagers;
use App\Models\JobPostCandidate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CandidateApplyResource extends Resource
{
    protected static ?string $model = JobPostCandidate::class;

    protected static ?string $navigationLabel = 'Ứng viên ứng tuyển';

    protected static ?string $modelLabel = 'Ứng viên ứng tuyển';

    protected static ?string $navigationGroup = 'Ứng viên';

    protected static ?string $navigationIcon = 'heroicon-o-document-minus';

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
//                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\CandidateApply::route('/'),
        ];
    }
}
