<?php

namespace App\Filament\Resources\Admin\Payment;

use App\Filament\Resources\Payment\PaymentResource\Pages;
use App\Models\Employer;
use App\Models\JobPostPackage;
use App\Models\Payment;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationLabel = 'Thanh toán';
    protected static ?string $modelLabel = 'Thanh toán';
    protected static ?string $navigationGroup = 'Quản lý thanh toán';
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Grid::make(1)->schema([
                            Section::make('Thông tin thanh toán')
                                ->schema([
                                    Select::make('employer_id')
                                        ->relationship('employer.user', 'name')

//                                        ->searchable()

                                        ->options(Employer::with('user')->get()->pluck('user.name', 'id'))
                                        ->required()
                                        ->nullable(false)
                                        ->label('Nhà tuyển dụng'),
                                    Select::make('packages_id')
                                        ->relationship('jobPostPackage', 'title')
                                        ->searchable()
                                        ->options(JobPostPackage::all()->pluck('title', 'id'))
                                        ->required()
                                        ->nullable(false)
                                        ->label('Gói đăng tin'),
                                    TextInput::make('amount')
                                        ->required()
                                        ->numeric()
                                        ->label('Số tiền'),
                                    Grid::make(2)
                                        ->schema([
                                            DateTimePicker::make('payment_date')
                                                ->required()
                                                ->label('Ngày thanh toán')
                                                ->displayFormat('d/m/Y - h:i A'),
                                            DateTimePicker::make('expiration_date')
                                                ->required()
                                                ->label('Ngày hết hạn')
                                                ->displayFormat('d/m/Y - h:i A'),
                                        ]),
                                    TextInput::make('payment_method')
                                        ->required()
                                        ->maxLength(255)
                                        ->label('Phương thức thanh toán'),
                                    Toggle::make('payment_status')
                                        ->label('Trạng thái')
                                        ->default(1),
                                ])
                        ])->columnSpan(2),

                        Grid::make(1)->schema([
                            Section::make()
                                ->schema([
                                    Placeholder::make('created_at')
                                        ->label('Thời gian tạo')
                                        ->content(fn($record) => $record ? $record->created_at->format('d/m/Y H:i:s') : '-'),

                                    Placeholder::make('updated_at')
                                        ->label('Thời gian cập nhật mới nhất')
                                        ->content(fn($record) => $record ? $record->updated_at->format('d/m/Y H:i:s') : '-'),
                                ])
                        ])->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),
                Tables\Columns\TextColumn::make('employer.user.name')->label('Nhà tuyển dụng')->searchable(),
                Tables\Columns\TextColumn::make('jobPostPackage.title')->label('Gói đăng tin')->searchable(),
                Tables\Columns\TextColumn::make('amount')->label('Số tiền')
                    ->formatStateUsing(fn($state) => number_format($state, 0, ',', ',') . ' vnđ'),
                Tables\Columns\TextColumn::make('payment_date')->label('Ngày thanh toán')->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y - h:i A')),
                Tables\Columns\TextColumn::make('expiration_date')->label('Ngày hết hạn')->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y - h:i A')),
                Tables\Columns\TextColumn::make('payment_method')->label('Phương thức thanh toán')->searchable(),
                Tables\Columns\BooleanColumn::make('payment_status')->label('Trạng thái')->default(true),
            ])
            ->filters([
                Filter::make('payment_method')
                    ->label('Lọc theo phương thức thanh toán')
                    ->query(fn(Builder $query, array $data) => $query->where('payment_method', 'like', '%' . $data['value'] . '%'))
                    ->form([
                        TextInput::make('value')
                            ->label('Phương thức thanh toán')
                            ->placeholder('Nhập phương thức thanh toán để lọc...')
                    ]),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                BulkActionGroup::make([
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
            'index' => \App\Filament\Resources\Admin\Payment\PaymentResource\Pages\ListPayments::route('/'),
            'create' => \App\Filament\Resources\Admin\Payment\PaymentResource\Pages\CreatePayment::route('/create'),
            'edit' => \App\Filament\Resources\Admin\Payment\PaymentResource\Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
