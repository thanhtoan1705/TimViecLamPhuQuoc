<?php

namespace App\Filament\Resources\Admin\Promotional;

use App\Filament\Resources\Admin\Promotional\PromotionalResource\Pages;
use App\Models\Promotion;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Carbon\Carbon;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;

class PromotionalResource extends Resource
{
    protected static ?string $model = Promotion::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    protected static ?string $navigationLabel = 'Mã ưu đãi';

    protected static ?string $modelLabel = 'Mã ưu đãi';

    protected static ?string $navigationGroup = 'Mã ưu đãi';

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
                Grid::make(3)
                    ->schema(components: [
                        Grid::make(columns: 3)->schema([
                            Section::make('Thông tin mã giảm giá')
                                ->schema([
                                    Grid::make(2)->schema([
                                        TextInput::make('code')
                                            ->label('Mã giảm giá')
                                            ->required()
                                            ->maxLength(255)
                                            ->rules([
                                                function (\Filament\Forms\Get $get) {
                                                    return Rule::unique('promotions', 'code')->ignore($get('id'));
                                                }
                                            ])
                                            ->columnSpan(1),

                                        TextInput::make('discount')
                                            ->label('Giảm giá')
                                            ->numeric()
                                            ->required()
                                            ->reactive()
                                            ->rule('min:0')
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                if ($state < 0) {
                                                    $set('discount', null);
                                                    Notification::make()
                                                        ->title('Giảm giá phải lớn hơn hoặc bằng 0!')
                                                        ->danger()
                                                        ->send();
                                                }
                                            })
                                            ->columnSpan(1),

                                        TextInput::make('number_use')
                                            ->label('Số lần sử dụng')
                                            ->numeric()
                                            ->required()
                                            ->rules(['min:1'])
                                            ->columnSpan(1),

                                        MarkdownEditor::make('describe')
                                            ->label('Mô tả')
                                            ->placeholder('Nhập mô tả mã giảm giá...')
                                            ->required()
                                            ->columnSpan(3),
                                    ]),
                                ])
                        ])->columnSpan(2),

                        Grid::make(1)->schema([
                            Section::make('Thời hạn')
                                ->schema([
                                    DatePicker::make('start_time')
                                        ->label('Thời gian bắt đầu')
                                        ->required()
                                        ->minDate(Carbon::today())
                                        ->reactive()
                                        ->afterStateUpdated(function (callable $set, $state) {
                                            if ($state < Carbon::today()) {
                                                $set('start_time', null);
                                                Notification::make()
                                                    ->title('Thời gian bắt đầu phải lớn hơn hoặc bằng ngày hiện tại!')
                                                    ->danger()
                                                    ->send();
                                            }
                                        }),

                                    DatePicker::make('end_time')
                                        ->label('Thời gian kết thúc')
                                        ->required()
                                        ->reactive()
                                        ->minDate(Carbon::today())
                                        ->afterStateUpdated(function (callable $set, $state, $get) {
                                            if ($state <= $get('start_time')) {
                                                $set('end_time', null);
                                                Notification::make()
                                                    ->title('Thời gian kết thúc phải sau thời gian bắt đầu!')
                                                    ->danger()
                                                    ->send();
                                            } elseif ($state < Carbon::today()) {
                                                $set('end_time', null);
                                                Notification::make()
                                                    ->title('Thời gian kết thúc phải lớn hơn hoặc bằng ngày hiện tại!')
                                                    ->danger()
                                                    ->send();
                                            }
                                        }),

                                    Section::make('Trạng thái')
                                        ->schema([
                                            Toggle::make('status')
                                                ->label('Hoạt dộng')
                                                ->default(true),
                                        ]),
                                ])
                        ])->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label('Mã giảm giá')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('discount')
                    ->label('Giảm giá')
                    ->suffix(' đ')
                    ->sortable(),

                Tables\Columns\TextColumn::make('number_use')
                    ->label('Số lần sử dụng')
                    ->sortable(),

                Tables\Columns\TextColumn::make('start_time')
                    ->label('Thời gian bắt đầu')
                    ->dateTime('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('end_time')
                    ->label('Thời gian kết thúc')
                    ->dateTime('d/m/Y')
                    ->sortable(),

                Tables\Columns\IconColumn::make('status')
                    ->label('Hoạt động')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
            ])
            ->filters([
                Filter::make('code')
                    ->label('Lọc theo mã giảm giá')
                    ->query(fn(Builder $query, array $data) => $query->where('code', 'like', '%' . $data['value'] . '%'))
                    ->form([
                        TextInput::make('value')
                            ->label('Mã giảm giá')
                            ->placeholder('Nhập mã giảm giá để lọc...'),
                    ]),
                Filter::make('discount')
                    ->label('Lọc theo mức giảm giá')
                    ->query(fn(Builder $query, array $data) => $query->where('discount', 'like', '%' . $data['value'] . '%'))
                    ->form([
                        TextInput::make('value')
                            ->label('Số tiền giảm giá')
                            ->numeric()
                            ->placeholder('Nhập số tiền giảm giá để lọc...')
                    ]),
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
            // Add any necessary relations here
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPromotionals::route('/'),
            'create' => Pages\CreatePromotional::route('/create'),
            'view' => Pages\ViewPromotional::route('/{record}'),
            'edit' => Pages\EditPromotional::route('/{record}/edit'),
        ];
    }
}
