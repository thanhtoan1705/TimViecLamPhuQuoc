<?php

namespace App\Filament\Resources\Employer\Candidate;

use App\Filament\Resources\Employer\Candidate\CandidateSearchResource\Pages;
use App\Models\Candidate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

class CandidateSearchResource extends Resource
{
    protected static ?string $model = Candidate::class;

    protected static ?string $navigationLabel = 'Tìm kiếm ứng viên';

    protected static ?string $modelLabel = 'Tìm kiếm ứng viên';

    protected static ?string $navigationGroup = 'Ứng viên';
    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Thêm form fields ở đây nếu cần
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Định nghĩa các cột ở đây
            ])
            ->filters([
                Filter::make('initial')
                    ->label('Chữ cái')
                    ->form([
                        Forms\Components\TextInput::make('initial')
                            ->label('Bắt đầu bằng chữ cái'),
                    ]),
                Filter::make('major')
                    ->label('Chuyên ngành')
                    ->form([
                        Forms\Components\Select::make('major')
                            ->options(Candidate::pluck('major_id', 'name')->toArray())
                            ->label('Chọn chuyên ngành'),
                    ]),
                Filter::make('skills')
                    ->label('Kỹ năng')
                    ->form([
                        Forms\Components\Select::make('skills')
                            ->multiple()
                            ->options(Candidate::pluck('skills.id', 'skills.name')->toArray())
                            ->label('Chọn kỹ năng'),
                    ]),
                Filter::make('experience')
                    ->label('Kinh nghiệm')
                    ->form([
                        Forms\Components\TextInput::make('experience')
                            ->label('Tối thiểu năm kinh nghiệm'),
                    ]),
                Filter::make('salary_min')
                    ->label('Mức lương tối thiểu')
                    ->form([
                        Forms\Components\TextInput::make('salary_min')
                            ->label('Nhập mức lương tối thiểu'),
                    ]),
                Filter::make('salary_max')
                    ->label('Mức lương tối đa')
                    ->form([
                        Forms\Components\TextInput::make('salary_max')
                            ->label('Nhập mức lương tối đa'),
                    ]),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\CandidateSearch::route('/'),
        ];
    }
}
