<?php

namespace App\Filament\Resources\Admin\Candidate;

use App\Filament\Resources\Admin\Candidate\CandidateResource\Pages\CreateCandidate;
use App\Filament\Resources\Candidate\CandidateResource\Pages;
use App\Filament\Resources\Candidate\CandidateResource\RelationManagers;
use App\Models\Address;
use App\Models\Candidate;
use App\Models\Degree;
use App\Models\District;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Major;
use App\Models\Province;
use App\Models\Salary;
use App\Models\Ward;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;


class CandidateResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Candidate::class;

    protected static ?string $navigationLabel = 'Ứng viên';
    protected static ?string $modelLabel = 'Ứng viên';
    protected static ?string $navigationGroup = 'Tài khoản';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $recordTitleAttribute = 'user.name';

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

                                Section::make('Thông tin tài khoản')
                                    ->schema([
                                        TextInput::make('user.name')
                                            ->required()
                                            ->maxLength(255)
                                            ->label('Tên ứng viên'),

                                        TextInput::make('user.email')
                                            ->required()
                                            ->email()
                                            ->maxLength(255)
                                            ->label('Email'),

                                        TextInput::make('user.phone')
                                            ->required()
                                            ->maxLength(20)
                                            ->label('Số điện thoại'),


                                        TextInput::make('user.password')
                                            ->label('Mật khẩu')
                                            ->password()
                                            ->maxLength(255)
                                            ->dehydrated(fn($state) => filled($state))
                                            ->required(fn(Page $livewire) => ($livewire instanceof CreateCandidate))


                                    ]),

                                Section::make('Thông tin ứng viên')->schema([
                                    Grid::make(1)
                                        ->schema([

                                            Select::make('major_id')
                                                ->label('Chuyên ngành')
                                                ->relationship('major', 'name')
                                                ->options(Major::pluck('name', 'id'))
                                                ->searchable()
                                                ->required(),

                                            Select::make('experience_id')
                                                ->label('Kinh nghiệm')
                                                ->relationship('experience', 'name')
                                                ->options(Experience::pluck('name', 'id'))
                                                ->searchable()
                                                ->required(),

                                            Select::make('education_id')
                                                ->label('Giáo dục')
                                                ->relationship('education', 'institution')
                                                ->options(Education::pluck('name', 'id'))
                                                ->required(),

//                                            Select::make('skill_id')
//                                                ->label('Kỹ năng')
//                                                ->relationship('skill', 'name')
//                                                ->options(Skill::pluck('name', 'id'))
//                                                ->required(),

                                            Select::make('skills')
                                                ->multiple()
                                                ->relationship('skills', 'name')
                                                ->placeholder('Vui lòng chọn kỹ năng')
                                                ->label('Kỹ năng')
                                                ->searchable()
                                                ->preload(),

                                            Select::make('degree_id')
                                                ->label('Bằng cấp')
                                                ->relationship('degree', 'name')
                                                ->options(Degree::pluck('name', 'id'))
                                                ->searchable()
                                                ->nullable(),

                                            Select::make('salary_id')
                                                ->label('Khoảng lương')
                                                ->relationship('salary', 'name')
                                                ->options(Salary::pluck('name', 'id'))
                                                ->searchable()
                                                ->nullable(),

//                                            TextInput::make('salary')
//                                                ->numeric()
//                                                ->nullable()
//                                                ->label('Mức lương'),

                                            RichEditor::make('description')
                                                ->nullable()
                                                ->label('Mô tả'),
                                        ]),

                                ]),


                            ])->columnSpan(2),

                        Grid::make(1)
                            ->schema([

                                Section::make('Hình ảnh')
                                    ->schema([
                                        FileUpload::make('user.avatar_url')
                                            ->label('Chọn ảnh định dang png, jpg, jpeg')
                                            ->image()
                                            ->disk('public')
                                            ->directory('images/users/candidates')

                                    ]),

                                Section::make('Hiển thị')
                                    ->schema([
                                        Toggle::make('status')
                                            ->label('Kích hoạt'),
                                    ]),
                                Section::make('Nổi bật')
                                    ->schema([

                                        Toggle::make('featured')
                                            ->label('Kích hoạt'),
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


                                Section::make('Thông tin địa chỉ')
                                    ->schema([

                                        Repeater::make('addresses')
                                            ->relationship('addresses')
                                            ->label('Nhập địa chỉ (nếu có)')
                                            ->schema([

                                                // Province/City Selector
                                                Select::make('province_id')
                                                    ->label('Tỉnh/Thành phố')
                                                    ->searchable()
                                                    ->options(Province::pluck('name', 'id')->toArray())
                                                    ->reactive()
                                                    ->afterStateUpdated(function (callable $set, $state) {
                                                        $districts = District::where('province_id', $state)->pluck('name', 'id')->toArray();
                                                        $set('district_id', null); // Reset quận/huyện khi tỉnh thay đổi
                                                        $set('ward_id', null); // Reset xã khi tỉnh thay đổi
                                                        $set('district_options', $districts);
                                                    }),


                                                // District Selector
                                                Select::make('district_id')
                                                    ->label('Quận/Huyện')
                                                    ->searchable()
                                                    ->options(fn($get) => District::where('province_id', $get('province_id'))->pluck('name', 'id')->toArray())
                                                    ->reactive()
                                                    ->afterStateUpdated(function (callable $set, $state) {
                                                        $wards = Ward::where('district_id', $state)->pluck('name', 'id')->toArray();
                                                        $set('ward_id', null); // Reset xã khi quận/huyện thay đổi
                                                        $set('ward_options', $wards);
                                                    }),

                                                // Ward Selector
                                                Select::make('ward_id')
                                                    ->label('Xã/Phường')
                                                    ->relationship('ward', 'name')
                                                    ->options(fn($get) => Ward::where('district_id', $get('district_id'))->pluck('name', 'id')->toArray()),

                                                TextInput::make('street')
                                                    ->label('Địa chỉ')
                                                    ->nullable(),

                                            ])->columns(1),


                                    ])->columnSpanFull()


                            ])->columnSpan(1),

                    ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),

                TextColumn::make('user.name')
                    ->label('Người dùng')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('major.name')
                    ->label('Chuyên ngành')
                    ->sortable()
                    ->searchable(),


                TextColumn::make('education.institution')
                    ->label('Giáo dục')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('skills.name')
                    ->label('Kỹ năng')
                    ->sortable()
                    ->searchable(),

                IconColumn::make('status')->boolean()->label('Hiển thị'),
                IconColumn::make('featured')->boolean()->label('Nổi bật'),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('degree')->label('Bằng cấp')
                    ->relationship('degree', 'name'),

                Tables\Filters\SelectFilter::make('education')->label('Giáo dục')
                    ->relationship('education', 'institution'),

                Tables\Filters\SelectFilter::make('major')->label('Chuyên ngành')
                    ->relationship('major', 'name'),

                Tables\Filters\SelectFilter::make('skills')->label('Kỹ năng')
                    ->relationship('skills', 'name'),

                Filter::make('status')->label('Hiển thị')->toggle(),
                Filter::make('featured')->label('Nổi bật')->toggle(),

            ], layout: FiltersLayout::Dropdown)
            ->actions([
                Tables\Actions\ActionGroup::make([
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
            'index' => \App\Filament\Resources\Admin\Candidate\CandidateResource\Pages\ListCandidates::route('/'),
            'create' => \App\Filament\Resources\Admin\Candidate\CandidateResource\Pages\CreateCandidate::route('/create'),
            'edit' => \App\Filament\Resources\Admin\Candidate\CandidateResource\Pages\EditCandidate::route('/{record}/edit'),
        ];
    }


    public static function saving(Candidate $candidate, array $data)
    {
        // Prepare address data from the form
        $addressData = [
            'province_id' => $data['province_id'],
            'district_id' => $data['district_id'],
            'ward_id' => $data['ward_id'],
            'street' => $data['street'],
        ];

        // Create or update the address record
        $address = Address::updateOrCreate(
            ['id' => $candidate->address_id],  // Update existing address if ID matches
            $addressData                    // Data to be updated or created
        );

        // Associate the address with the candidate
        $candidate->address_id = $address->id;
    }

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


}

