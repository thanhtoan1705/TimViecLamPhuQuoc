<?php

namespace App\Filament\Resources\Admin\JobPostPackage;

use App\Filament\Resources\JobPostPackage\JobPostPackageResource\Pages;
use App\Models\JobPostPackage;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class JobPostPackageResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = JobPostPackage::class;

    protected static ?string $navigationLabel = 'Gói đăng tin';
    protected static ?string $modelLabel = 'Gói đăng tin';
    protected static ?string $navigationGroup = 'Dịch vụ';
    protected static ?string $navigationIcon = 'heroicon-o-cube';

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
                            Section::make('Thông tin gói đăng việc')
                                ->schema([
                                    TextInput::make('title')
                                        ->required()
                                        ->rules(['regex:/^[\w\s-]+$/u'])
                                        ->maxLength(255)
                                        ->label('Tiêu đề gói'),
                                    TextInput::make('price')
                                        ->required()
                                        ->rules(['min:10000'])
                                        ->numeric()
                                        ->label('Giá'),
                                    TextInput::make('period')
                                        ->required()
                                        ->rules(['regex:/^[\w\s-]+$/u'])
                                        ->maxLength(255)
                                        ->label('Thời hạn'),
                                    TextInput::make('quantity')
                                        ->required()
                                        ->rules(['min:1'])
                                        ->numeric()
                                        ->label('Số lượng'),
                                    TextInput::make('limit_job_post')
                                        ->required()
                                        ->rules(['min:1'])
                                        ->numeric()
                                        ->label('Giới hạn bài đăng'),
                                    Grid::make(3)
                                        ->schema([
                                            Toggle::make('display_top')
                                                ->label('Hiển thị trên cùng')
                                                ->default(true),
                                            Toggle::make('display_best')
                                                ->label('Hiển thị tốt nhất')
                                                ->default(true),
                                            Toggle::make('display_haste')
                                                ->label('Hiển thị khẩn cấp')
                                                ->default(true),
                                        ]),
                                    Textarea::make('descriptions')
                                        ->label('Mô tả gói')
                                        ->required(),
                                    Toggle::make('status')
                                        ->label('Trạng thái')
                                        ->default(true),
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
                Tables\Columns\TextColumn::make('title')->label('Tiêu đề gói')->searchable(),
                Tables\Columns\TextColumn::make('price')->label('Giá')
                    ->formatStateUsing(fn($state) => number_format($state, 0, ',', ',') . ' vnđ'),
                Tables\Columns\TextColumn::make('period')->label('Thời hạn')->searchable(),
                Tables\Columns\TextColumn::make('quantity')->label('Số lượng')->searchable(),
                Tables\Columns\TextColumn::make('limit_job_post')->label('Giới hạn bài đăng')->searchable(),
                Tables\Columns\BooleanColumn::make('display_top')->label('Hiển thị trên cùng'),
                Tables\Columns\BooleanColumn::make('display_best')->label('Hiển thị tốt nhất'),
                Tables\Columns\BooleanColumn::make('display_haste')->label('Hiển thị khẩn cấp'),
                Tables\Columns\BooleanColumn::make('status')->label('Trạng thái')->default(true),
            ])
            ->filters([
                Filter::make('title')
                    ->label('Lọc theo tiêu đề')
                    ->query(fn(Builder $query, array $data) => $query->where('title', 'like', '%' . $data['value'] . '%'))
                    ->form([
                        TextInput::make('value')
                            ->label('Tiêu đề gói')
                            ->placeholder('Nhập tiêu đề để lọc...')
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
            'index' => \App\Filament\Resources\Admin\JobPostPackage\JobPostPackageResource\Pages\ListJobPostPackages::route('/'),
            'create' => \App\Filament\Resources\Admin\JobPostPackage\JobPostPackageResource\Pages\CreateJobPostPackage::route('/create'),
            'edit' => \App\Filament\Resources\Admin\JobPostPackage\JobPostPackageResource\Pages\EditJobPostPackage::route('/{record}/edit'),
        ];
    }
}
