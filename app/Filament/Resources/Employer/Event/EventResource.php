<?php

namespace App\Filament\Resources\Employer\Event;

use App\Filament\Resources\Employer\Event\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use App\Filament\Employer\Widgets\CalendarWidget;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationLabel = 'Sự kiện';

    protected static ?string $modelLabel = 'Sự kiện';

    protected static ?string $navigationGroup = 'Sự kiện';
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';


    public static function getNavigationBadge(): ?string
    {
        $userId = Auth::user()->id;

        if ($userId) {
            // Giả sử mô hình của bạn có cột `employer_id`
            return static::getModel()::where('user_id', $userId)->count();
        }

        return null;
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'primary';
    }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Grid::make(3)->schema([
                            Section::make('Thông tin sự kiện')
                                ->schema([
                                    Grid::make(2)->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Tiêu đề')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Hidden::make('user_id')
                                            ->default(Auth::user()->id),
                                        Forms\Components\ColorPicker::make('color')
                                            ->label('Màu sắc')
                                            ->required(),
                                        Forms\Components\DateTimePicker::make('start_at')
                                            ->label('Bắt đầu')
                                            ->required(),
                                        Forms\Components\DateTimePicker::make('end_at')
                                            ->label('Kết thúc')
                                            ->required(),

                                    ]),
                                    Grid::make(1)->schema([
                                        Forms\Components\RichEditor::make('description')
                                            ->label('Mô tả (nếu có)')
                                            ->maxLength(255),
                                    ]),
                                ]),



                        ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        $userId = Auth::user()->id;
        return $table
            ->defaultSort('created_at', 'desc')
            ->modifyQueryUsing(function (Builder $query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),
                Tables\Columns\TextColumn::make('title')->label('Tiêu đề')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_at')->label('Thời gian bắt đầu')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_at')->label('Thời gian kết thúc')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Tạo lúc')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
