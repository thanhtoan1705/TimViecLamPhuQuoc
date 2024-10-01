<?php

namespace App\Filament\Resources\Admin\Payment;

use App\Filament\Resources\Payment\PaymentResource\Pages;
use App\Models\Employer;
use App\Models\JobPostPackage;
use App\Models\Payment;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PaymentResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationLabel = 'Thanh toán';
    protected static ?string $modelLabel = 'Thanh toán';
    protected static ?string $navigationGroup = 'Quản lý thanh toán';
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
        ];
    }

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
                    ->schema([
                        Grid::make(1)->schema([
                            Section::make('Thông tin thanh toán')
                                ->schema([
                                    Select::make('employer_id')
                                        ->relationship('employer.user', 'name')
                                        ->searchable()

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
                                        ->rules(['min:10000'])
                                        ->numeric()
                                        ->label('Số tiền'),
                                    Grid::make(2)
                                        ->schema([
                                            DateTimePicker::make('payment_date')
                                                ->required()
                                                ->label('Ngày thanh toán')
                                                ->displayFormat('d/m/Y - h:i A')
                                                ->afterStateUpdated(function ($state, callable $set, $get) {
                                                    if ($get('expiration_date') && $state >= $get('expiration_date')) {
                                                        $set('expiration_date', null);
                                                    }
                                                }),
                                            DateTimePicker::make('expiration_date')
                                                ->required()
                                                ->label('Ngày hết hạn')
                                                ->displayFormat('d/m/Y - h:i A')
                                                ->afterStateUpdated(function ($state, callable $set, $get) {
                                                    if ($state <= $get('payment_date')) {
                                                        $set('expiration_date', null);
                                                        Notification::make()
                                                            ->title('Ngày hết hạn phải lớn hơn ngày thanh toán')
                                                            ->danger()
                                                            ->send();
                                                    }
                                                }),
                                        ]),
                                    TextInput::make('payment_method')
                                        ->required()
                                        ->rules(['regex:/^[\w\s-]+$/u'])
                                        ->maxLength(255)
                                        ->label('Phương thức thanh toán'),
                                    Toggle::make('payment_status')
                                        ->label('Trạng thái')
                                        ->required()
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
                Tables\Columns\TextColumn::make('payment_date')->label('Ngày thanh toán')->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)
                    ->format('d/m/Y - h:i A'))->sortable(),
                Tables\Columns\TextColumn::make('expiration_date')->label('Ngày hết hạn')->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y - h:i A')),
                Tables\Columns\TextColumn::make('payment_method')->label('Phương thức thanh toán')->searchable(),
                Tables\Columns\BooleanColumn::make('payment_status')->label('Trạng thái')->default(true),
            ])
            ->filters([
                Filter::make('payment_date')
                    ->label('Lọc theo ngày thanh toán')
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['start_date']) && !empty($data['end_date'])) {
                            $startDate = \Carbon\Carbon::parse($data['start_date'])->startOfDay();
                            $endDate = \Carbon\Carbon::parse($data['end_date'])->endOfDay();

                            return $query->whereBetween('payment_date', [$startDate, $endDate]);
                        }
                        return $query;
                    })
                    ->form([
                        DatePicker::make('start_date')
                            ->label('Từ ngày'),

                        DatePicker::make('end_date')
                            ->label('Đến ngày'),
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
