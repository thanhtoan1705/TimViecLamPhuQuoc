<?php

namespace App\Filament\Resources\Employer;

use App\Filament\Resources\Employer\EmployerResource\Pages;
use App\Filament\Resources\Employer\EmployerResource\Pages\CreateEmployer;
use App\Filament\Resources\Employer\EmployerResource\RelationManagers;
use App\Models\Employer;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class EmployerResource extends Resource
{
    protected static ?string $model = Employer::class;

    protected static ?string $navigationLabel = 'Nhà tuyên dụng';

    protected static ?string $modelLabel = 'Nhà tuyển dụng';

    protected static ?string $navigationGroup = 'Tài khoản';

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

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
                        Grid::make(1)
                            ->schema([
                                Section::make('Thông tin nhà tuyển dụng')
                                    ->schema([
                                        TextInput::make('user.name')
                                            ->required()
                                            ->maxLength(255)
                                            ->label('Tên nhà tuyển dụng'),

                                        TextInput::make('user.email')
                                            ->required()
                                            ->email()
                                            ->label('Email'),

                                        TextInput::make('user.phone')
                                            ->required()
                                            ->maxLength(20)
                                            ->label('Số điện thoại'),

                                        TextInput::make('user.password')
                                            ->label('Mật khẩu')
                                            ->password()
                                            ->dehydrated(fn($state) => filled($state))
                                            ->required(fn(Page $livewire) => ($livewire instanceof CreateEmployer)),

                                        FileUpload::make('user.image')
                                            ->label('Ảnh đại diện'),
                                    ]),
                                Section::make('Thông tin nhà tuyển dụng')
                                    ->schema([
                                        TextInput::make('company_name')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                                if ($operation === 'create' || 'update') {
                                                    $slug = Str::slug($state);
                                                    $set('slug', $slug);
                                                }
                                            })
                                            ->label('Tên công ty'),

                                        TextInput::make('slug')
                                            ->label('Đường dẫn')
                                            ->maxLength(255)
                                            ->unique(Employer::class, 'slug', ignoreRecord: true),

                                        RichEditor::make('description')
                                            ->label('Mô tả')
                                            ->required(),
                                    ]),

                                Section::make('Quy mô công ty')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                DatePicker::make('since')
                                                    ->label('Ngày thành lập'),

                                                TextInput::make('tax_code')
                                                    ->label('Mã số thuế'),

                                                TextInput::make('company_size')
                                                    ->label('Số nhân viên'),

                                                TextInput::make('company_type')
                                                    ->label('Loại công ty'),
                                            ]),
                                    ]),
                            ])
                            ->columnSpan(2),

                        Grid::make(1)
                            ->schema([
                                Section::make('Logo công ty')
                                    ->schema([
                                        FileUpload::make('company_logo')
                                            ->label('Logo công ty'),
                                    ]),

                                Section::make('Liên hệ')
                                    ->schema([
                                        TextInput::make('company_phone')
                                            ->label('Số điện thoại công ty'),
                                        TextInput::make('facebook_url')
                                            ->label('Facebook'),
                                        TextInput::make('website_url')
                                            ->label('Website'),
                                    ]),

                                Section::make('Trạng thái')
                                    ->schema([
                                        Toggle::make('status')
                                            ->label('Hiển thị'),
                                    ]),

                                Section::make('Thời gian')
                                    ->schema([
                                        Placeholder::make('created_at')
                                            ->label('Thời gian tạo')
                                            ->content(fn($record) => $record ? $record->created_at->format('d/m/Y H:i:s') : '-'),

                                        Placeholder::make('updated_at')
                                            ->label('Thời gian cập nhật mới nhất')
                                            ->content(fn($record) => $record ? $record->updated_at->format('d/m/Y H:i:s') : '-'),
                                    ]),
                            ])
                            ->columnSpan(1),
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
                Tables\Columns\TextColumn::make('company_name')->label('Tên công ty'),
                Tables\Columns\TextColumn::make('company_phone')->label('Điện thoại'),
                Tables\Columns\TextColumn::make('company_type')->label('Loại công ty'),
                Tables\Columns\IconColumn::make('status')->boolean()->label('Công khai'),
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
            'index' => Pages\ListEmployers::route('/'),
            'create' => Pages\CreateEmployer::route('/create'),
            'edit' => Pages\EditEmployer::route('/{record}/edit'),
        ];
    }

    public static function query(): Builder
    {
        return Employer::query()->with('user');
    }

}
