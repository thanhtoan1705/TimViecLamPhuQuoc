<?php

namespace App\Filament\Resources\Admin\User;

use App\Filament\Resources\Admin\Candidate\CandidateResource\Pages\CreateCandidate;
use App\Filament\Resources\Admin\User\UserResource\Pages;
use App\Filament\Resources\Admin\User\UserResource\RelationManagers;
use App\Models\User;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Rmsramos\Activitylog\Actions\ActivityLogTimelineTableAction;
use Rmsramos\Activitylog\RelationManagers\ActivitylogRelationManager;

class UserResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = User::class;

    protected static ?string $navigationLabel = 'Thành viên';

    protected static ?string $modelLabel = 'Thành viên';

    protected static ?string $navigationGroup = 'Filament Shield';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

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
        return static::getModel()::where('role', 'admin')->count();
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

                                Section::make('Thông tin tài khoản')
                                    ->schema([
                                        TextInput::make('name')
                                            ->required()
                                            ->maxLength(255)
                                            ->label('Họ tên'),

                                        TextInput::make('email')
                                            ->required()
                                            ->email()
                                            ->maxLength(255)
                                            ->label('Email'),

                                        TextInput::make('phone')
                                            ->required()
                                            ->maxLength(20)
                                            ->label('Số điện thoại'),


                                        TextInput::make('password')
                                            ->label('Mật khẩu')
                                            ->password()
                                            ->maxLength(255)
                                            ->dehydrated(fn($state) => filled($state))
                                            ->required(fn(Page $livewire) => ($livewire instanceof Pages\CreateUser)),

                                         Forms\Components\Select::make('roles')->label('Vai trò')
                                             ->relationship('roles', 'name')
                                             ->multiple()
                                             ->preload()
                                             ->searchable(),
                                    ]),


                            ])->columnSpan(2),

                        Grid::make(1)
                            ->schema([

                                Section::make('Avatar')
                                    ->schema([
                                        FileUpload::make('avatar_url')
                                            ->label('Chọn ảnh định dang png, jpg, jpeg')
                                            ->image()
                                            ->disk('public')
                                            ->directory('images/users/avatar')

                                    ]),

                                Section::make('Trạng thái')
                                    ->schema([
                                        Toggle::make('status')
                                            ->label('Kích hoạt'),
                                    ]),

                            ])->columnSpan(1),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
//            ->modifyQueryUsing(function (Builder $query) {
//                    $query->where('role', 'admin');
//            })
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),
                Tables\Columns\ImageColumn::make('avatar_url')
                    ->circular()
                    ->defaultImageUrl(asset('default/user.png'))
                    ->label('Avatar'),
                Tables\Columns\TextColumn::make('name')->label('Họ tên'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('phone')->label('Điện thoại'),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Vai trò')
                    ->badge(),
                Tables\Columns\BooleanColumn::make('email_verified_at')
                    ->label('Xác thực'),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActivityLogTimelineTableAction::make('Hoạt-động')->color('danger')
                    ->timelineIcons([
                        'created' => 'heroicon-m-check-badge',
                        'updated' => 'heroicon-m-pencil-square',
                    ])
                    ->timelineIconColors([
                        'created' => 'info',
                        'updated' => 'warning',
                    ])
                    ->limit(10),
                Tables\Actions\ActionGroup::make([

                    Tables\Actions\EditAction::make(),
                    // Tables\Actions\DeleteAction::make(),

                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
//        return [
//            'index' => Pages\ManageUsers::route('/'),
//        ];

        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            ActivitylogRelationManager::class,
        ];
    }
}
