<?php

namespace App\Filament\Resources\Admin\UserJobPackage;

use App\Filament\Resources\UserJobPackage\UserJobPackageResource\Pages;
use App\Filament\Resources\UserJobPackage\UserJobPackageResource\RelationManagers;
use App\Models\Employer;
use App\Models\JobPostPackage;
use App\Models\UserJobPackage;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserJobPackageResource extends Resource
{
    protected static ?string $model = UserJobPackage::class;

    protected static ?string $navigationLabel = 'Gói đăng tin người dùng';
    protected static ?string $modelLabel = 'Gói đăng tin người dùng';
    protected static ?string $navigationGroup = 'Dịch vụ';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Grid::make(1)->schema([
                            Section::make('Thông tin gói đăng tin')
                                ->schema([
                                    Select::make('employer_id')
                                        ->relationship('employer', 'company_name')
                                        ->options(Employer::all()->pluck('company_name', 'id'))
                                        ->searchable()
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

                                    TextInput::make('remaining_posts')
                                        ->required()
                                        ->rules(['min:1'])
                                        ->numeric()
                                        ->label('Số bài đăng còn lại'),

                                    DateTimePicker::make('expires_at')
                                        ->required()
                                        ->label('Ngày hết hạn')
                                        ->displayFormat('d/m/Y - h:i A'),
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

                Tables\Columns\TextColumn::make('employer.company_name')->label('Nhà tuyển dụng')->searchable(),
                Tables\Columns\TextColumn::make('jobPostPackage.title')->label('Gói đăng tin')->searchable(),
                Tables\Columns\TextColumn::make('remaining_posts')->label('Số bài đăng còn lại'),
                Tables\Columns\TextColumn::make('expires_at')->label('Ngày hết hạn')->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)->format('d/m/Y - h:i A')),
            ])
            ->filters([
                Filter::make('expires_at')
                    ->label('Lọc theo ngày hết hạn')
                    ->query(function (Builder $query, array $data) {
                        $date = \Carbon\Carbon::parse($data['value']);
                        return $query->whereDate('expires_at', '<=', $date);
                    })
                    ->form([
                        DateTimePicker::make('value')
                            ->label('Ngày hết hạn')
                            ->placeholder('Chọn ngày hết hạn để lọc...')
                            ->displayFormat('d/m/Y - h:i A'), // Định dạng ngày tháng
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
            'index' => \App\Filament\Resources\Admin\UserJobPackage\UserJobPackageResource\Pages\ListUserJobPackages::route('/'),
            'create' => \App\Filament\Resources\Admin\UserJobPackage\UserJobPackageResource\Pages\CreateUserJobPackage::route('/create'),
            'edit' => \App\Filament\Resources\Admin\UserJobPackage\UserJobPackageResource\Pages\EditUserJobPackage::route('/{record}/edit'),
        ];
    }
}
