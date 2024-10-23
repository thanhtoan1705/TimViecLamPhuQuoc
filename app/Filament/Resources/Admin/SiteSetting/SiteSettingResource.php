<?php

namespace App\Filament\Resources\Admin\SiteSetting;

use App\Filament\Resources\Admin\SiteSetting\SiteSettingResource\Pages;
use App\Filament\Resources\Admin\SiteSetting\SiteSettingResource\RelationManagers;
use App\Models\SiteSetting;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;

class SiteSettingResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = SiteSetting::class;

    protected static ?string $slug = 'setting';
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $modelLabel = 'Cấu hình hệ thống';
    protected static ?string $navigationGroup = 'Cấu hình chung';

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('SettingsTabs')
                    ->tabs([
                        Tabs\Tab::make('Thông tin công ty')
                            ->schema([
                                TextInput::make('company_name')
                                    ->label('Tên công ty')->required(),
                                TextInput::make('brand_name')
                                    ->label('Tên thương hiệu')
                                    ->required(),
                                TextInput::make('slogan')
                                    ->label('Slogan')
                                    ->nullable(),
                                FileUpload::make('logo_website')
                                    ->label('Logo Website')
                                    ->required()
                                    ->helperText('Chọn định dạng ảnh PNG, JPG, kích thước tối đa 2MB')
                                    ->acceptedFileTypes(['image/png', 'image/jpeg'])
                                    ->maxSize(2048)
                                    ->directory('vieclamphuquoc/logo')
                                    ->image()
                                    ->enableOpen()
                                    ->enableDownload()
                                    ->reactive()
                                    ->dehydrated(),


                                // Sử dụng Grid để tạo bố cục cho logo_mobile và favicon
                                Forms\Components\Grid::make()
                                    ->schema([
                                        FileUpload::make('logo_mobile')
                                            ->label('Logo Mobile')
                                            ->nullable()
                                            ->helperText('Chọn định dạng ảnh PNG, JPG, kích thước tối đa 2MB')
                                            ->acceptedFileTypes(['image/png', 'image/jpeg'])
                                            ->maxSize(2048)
                                            ->directory('vieclamphuquoc/logo')
                                            ->image()
                                            ->enableOpen()
                                            ->enableDownload(),
                                        FileUpload::make('favicon')
                                            ->label('Favicon')
                                            ->nullable()
                                            ->helperText('Chọn định dạng ảnh PNG, JPG, kích thước tối đa 2MB')
                                            ->acceptedFileTypes(['image/png', 'image/jpeg'])
                                            ->maxSize(2048)
                                            ->directory('uploads/vieclamphuquoc/logo')
                                            ->image()
                                            ->enableOpen()
                                            ->enableDownload(),
                                    ])->columns(2),

                                Select::make('website_status')
                                    ->label('Tình trạng website')
                                    ->options([
                                        1 => 'Đang hoạt động',
                                        0 => 'Đang bảo trì',
                                    ])
                                    ->default(1)
                                    ->required(),
                                Textarea::make('short_intro')->label('Mô tả')->nullable(),

                                TextInput::make('copyright')->label('Copyright')->nullable(),


                            ])->columnSpan('full'),



                        Tabs\Tab::make('Liên hệ')
                            ->schema([
                                TextInput::make('company_address')->label('Địa chỉ công ty')->nullable(),
                                TextInput::make('transaction_office')->label('Văn phòng giao dịch')->nullable(),
                                TextInput::make('tax_code')->label('Mã số thuế')->nullable(),
                                TextInput::make('hotline')->label('Hotline')->nullable(),
                                TextInput::make('hotline_technical')->label('Hotline kỹ thuật')->nullable(),
                                TextInput::make('hotline_sales')->label('Hotline kinh doanh')->nullable(),
                                TextInput::make('landline')->label('Số cố định')->nullable(),
                                TextInput::make('email')->label('Email')->nullable(),
                                TextInput::make('website')->label('Website')->nullable(),
                                Textarea::make('map')->label('Bản đồ')->nullable(),
                            ])->columnSpan('full'),

                        Tabs\Tab::make('SEO')
                            ->schema([
                                TextInput::make('seo_title')->label('Tiêu đề SEO')->nullable(),
                                Textarea::make('seo_keywords')->label('Từ khóa SEO')->nullable(),
                                Textarea::make('seo_description')
                                    ->label('Mô tả SEO')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->helperText('Tối đa 255 ký tự'),

                                FileUpload::make('seo_image')->label('Ảnh SEO')->nullable()
                                    ->helperText('Kích thước tối ưu: 300x200px')
                                    ->helperText('Chọn định dạng ảnh PNG, JPG, kích thước tối đa 2MB')
                                    ->acceptedFileTypes(['image/png', 'image/jpeg'])
                                    ->maxSize(2048)
                                    ->directory('vieclamphuquoc/seo')
                                    ->image()
                                    ->enableOpen()
                                    ->enableDownload(),

                            ])->columnSpan('full'),

                        Tabs\Tab::make('Mạng xã hội')
                            ->schema([

                                TextInput::make('facebook')
                                    ->label('Facebook')
                                    ->nullable()
                                    ->afterStateHydrated(fn ($state, callable $set) => $set('facebook', self::addHttpsIfMissing($state)))
                                    ->dehydrateStateUsing(fn ($state) => self::addHttpsIfMissing($state)),

                                TextInput::make('youtube')
                                    ->label('Youtube')
                                    ->nullable()
                                    ->afterStateHydrated(fn ($state, callable $set) => $set('youtube', self::addHttpsIfMissing($state)))
                                    ->dehydrateStateUsing(fn ($state) => self::addHttpsIfMissing($state)),

                                TextInput::make('twitter')
                                    ->label('Twitter - X')
                                    ->nullable()
                                    ->afterStateHydrated(fn ($state, callable $set) => $set('twitter', self::addHttpsIfMissing($state)))
                                    ->dehydrateStateUsing(fn ($state) => self::addHttpsIfMissing($state)),

                                TextInput::make('tiktok')
                                    ->label('Tiktok')
                                    ->nullable()
                                    ->afterStateHydrated(fn ($state, callable $set) => $set('tiktok', self::addHttpsIfMissing($state)))
                                    ->dehydrateStateUsing(fn ($state) => self::addHttpsIfMissing($state)),

                                TextInput::make('instagram')
                                    ->label('Instagram')
                                    ->nullable()
                                    ->afterStateHydrated(fn ($state, callable $set) => $set('instagram', self::addHttpsIfMissing($state)))
                                    ->dehydrateStateUsing(fn ($state) => self::addHttpsIfMissing($state)),
                            ])->columnSpan('full'),
                    ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('facebook')->label('facebook')->searchable(),
            ])
            ->filters([/* Add filters here (if needed) */])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteSettings::route('/'),
//            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }

    protected static function addHttpsIfMissing(?string $url): ?string
    {
        if ($url && !preg_match('/^(http:\/\/|https:\/\/)/', $url)) {
            return 'https://' . $url;
        }
        return $url;
    }


}
