<?php

namespace App\Filament\Resources\Admin\Candidate;

use App\Filament\Resources\Admin\Candidate\CandidateResource\Pages\CreateCandidate;
use App\Filament\Resources\Candidate\CandidateResource\Pages;
use App\Filament\Resources\Candidate\CandidateResource\RelationManagers;
use App\Jobs\Client\SendNewsletterEmail;
use App\Models\Address;
use App\Models\Candidate;
use App\Models\Degree;
use App\Models\District;
use App\Models\Experience;
use App\Models\Major;
use App\Models\Province;
use App\Models\Salary;
use App\Models\Ward;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;


class CandidateResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Candidate::class;
    protected static ?string $slug = 'candidate';

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
                                            ->label('Số điện thoại')
                                            ->rules([
                                                'regex:/^((\+?[1-9]\d{1,14})|(0\d{9,10}))$/',
                                            ]),


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

                                Section::make('Kinh nghiệm làm việc')
                                    ->schema([
                                        Repeater::make('work_experiences')
                                            ->label('Kinh nghiệm làm việc')
                                            ->relationship('workExperiences')
                                            ->schema([
                                                TextInput::make('position')
                                                    ->label('Vị trí'),
                                                TextInput::make('company_name')
                                                    ->label('Tên công ty'),
                                                DatePicker::make('start_date')
                                                    ->label('Ngày bắt đầu'),
                                                DatePicker::make('end_date')
                                                    ->label('Ngày kết thúc'),
                                                RichEditor::make('description')
                                                    ->label('Mô tả công việc')
                                                ->columnSpanFull(),
                                            ])
                                            ->columns(2),
                                    ]),

                                Section::make('Giáo dục')
                                    ->schema([
                                        Repeater::make('educations')
                                            ->relationship('educations')
                                            ->label('Giáo dục')
                                            ->schema([
                                                TextInput::make('major_name')
                                                    ->label('Chuyên ngành'),
                                                TextInput::make('institution_name')
                                                    ->label('Tên trường'),
                                                DatePicker::make('start_date')
                                                    ->label('Ngày bắt đầu'),
                                                DatePicker::make('end_date')
                                                    ->label('Ngày kết thúc'),
                                                TextInput::make('classification')
                                                    ->label('Xếp loại'),
                                                TextInput::make('gpa')
                                                    ->numeric()
                                                    ->label('Điểm trung bình'),
                                            ])
                                            ->columns(2),
                                    ]),

                                Section::make('Ngôn ngữ')
                                    ->schema([
                                        Repeater::make('language_proficiencies')
                                            ->relationship('languageProficiencies')
                                            ->label('Ngôn ngữ')
                                            ->schema([
                                                TextInput::make('language')
                                                    ->label('Ngôn ngữ'),
                                                Select::make('proficiency_level')
                                                    ->options([
                                                        'Beginner' => 'Beginner',
                                                        'Elementary' => 'Elementary',
                                                        'Intermediate' => 'Intermediate',
                                                        'Advanced' => 'Advanced',
                                                        'Proficient' => 'Proficient',
                                                    ])
                                                    ->label('Trình độ'),
                                            ])
                                            ->columns(2),
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

                                Section::make('Xác thực')
                                    ->schema([
                                        DateTimePicker::make('user.email_verified_at')
                                        ->label('Xác thực')
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
                                        Select::make('province_id')
                                            ->label('Tỉnh/Thành phố')
                                            ->searchable()
                                            ->options(Province::pluck('name', 'id')->toArray())
                                            ->reactive()
                                            ->required()
                                            ->afterStateUpdated(function (callable $set, $state) {
                                                $districts = District::where('province_id', $state)->pluck('name', 'id')->toArray();
                                                $set('district_id', null);
                                                $set('ward_id', null);
                                                $set('district_options', $districts);
                                            }),

                                        Select::make('district_id')
                                            ->label('Quận/Huyện')
                                            // ->searchable()
                                            ->required()
                                            ->options(fn($get) => District::where('province_id', $get('province_id'))->pluck('name', 'id')->toArray())
                                            ->reactive()
                                            ->afterStateUpdated(function (callable $set, $state) {
                                                $wards = Ward::where('district_id', $state)->pluck('name', 'id')->toArray();
                                                $set('ward_id', null);
                                                $set('ward_options', $wards);
                                            }),

                                        Select::make('ward_id')
                                            ->label('Xã/Phường')
                                            ->required()
                                            ->options(fn($get) => Ward::where('district_id', $get('district_id'))->pluck('name', 'id')->toArray()),

                                        TextInput::make('street')
                                            ->label('Địa chỉ')
                                            ->maxLength(255),


                                    ])
                                    ->columnSpanFull(),


                            ])->columnSpan(1),

                    ]),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                Candidate::whereHas('user', function ($query) {
                    $query->where('role', 'candidate'); // Lọc role bạn muốn
                })
            )
            ->defaultSort('created_at', 'desc')
            ->columns([
//                TextColumn::make('row_number')
//                    ->label('STT')
//                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),
                Tables\Columns\TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),


                ImageColumn::make('user.avatar_url')
                    ->grow(false)
                    ->circular()
                    ->getStateUsing(fn($record) => getStorageImageUrl($record->user->avatar_url, config('image.avatar')))
                    ->label('Avatar'),
                TextColumn::make('user.name')
                    ->searchable()
                    ->label('Họ tên')->limit(20),

                TextColumn::make('user.phone')->icon('heroicon-o-phone')
                    ->searchable()
                    ->label('Điện thoại'),
                TextColumn::make('user.email')->icon('heroicon-o-envelope')
                    ->searchable()
                    ->label('Email'),


                IconColumn::make('user.email_verified_at')
                    ->label('Xác thực')
                    ->getStateUsing(fn ($record) => $record->user->email_verified_at ? true : false) // Tự xác định giá trị true/false
                    ->trueIcon('heroicon-s-check-circle')
                    ->falseIcon('heroicon-s-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                ToggleColumn::make('status')
                    ->label('Trạng thái'),


            ])
            ->filters([
                Tables\Filters\SelectFilter::make('degree')->label('Bằng cấp')
                    ->relationship('degree', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('major')->label('Chuyên ngành')
                    ->relationship('major', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('experience')->label('Kinh nghiệm')
                    ->relationship('experience', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('salary')->label('Khoảng lương')
                    ->relationship('salary', 'name')
                    ->searchable()
                    ->preload(),



            ], layout: FiltersLayout::Dropdown)
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),

                    Action::make('editPassword')
                        ->label('Đổi mật khẩu')
                        ->icon('heroicon-o-key')
                        ->action(function ($record, array $data) {
                            // Kiểm tra nếu liên kết tới model user và cập nhật mật khẩu
                            $record->user->update([
                                'password' => Hash::make(($data['password'])), // Mã hóa mật khẩu
                            ]);
                        })
                        ->form([
                            TextInput::make('email')
                                ->label('Email')
                                ->default(fn ($record) => $record->user->email) // Hiển thị email từ mối quan hệ
                                ->disabled() // Không cho phép chỉnh sửa
                                ->dehydrated(false), // Không gửi dữ liệu này vào request
                            TextInput::make('password')
                                ->label('Mật khẩu mới')
                                ->password() // Ẩn giá trị đầu vào
                                ->required()
                                ->maxLength(200),
                        ])
                        ->modalHeading('Đổi mật khẩu')
                        ->modalButton('Cập nhật'),

                    Action::make('editMailVerify')
                        ->label('Xác thực tài khoản')
                        ->icon('heroicon-o-check-badge')
                        ->action(function ($record, array $data) {
                            // Cập nhật email_verified_at nếu có giá trị
                            $record->user->update([
                                'email_verified_at' => $data['email_verified_at'],
                            ]);
                        })
                        ->form(function ($record) {
                            // Chỉ hiển thị trường email_verified_at nếu giá trị hiện tại là null hoặc rỗng
                            $fields = [
                                TextInput::make('email')
                                    ->label('Email')
                                    ->default(fn ($record) => $record->user->email)
                                    ->disabled() // Không cho phép chỉnh sửa
                                    ->dehydrated(false),

                                TextInput::make('name')
                                    ->label('Họ tên')
                                    ->default(fn ($record) => $record->user->name)
                                    ->disabled()
                                    ->dehydrated(false),
                            ];

                            if (empty($record->user->email_verified_at)) {
                                $fields[] = DateTimePicker::make('email_verified_at')
                                    ->label('Ngày giờ xác thực')
                                    ->required(); // Bắt buộc nhập
                            }else {
                                $fields[] = TextInput::make('email_verified_at')
                                    ->label('Tài khoản đã xác thực')
                                    ->default(fn ($record) => $record->user->email_verified_at) // Hiển thị email từ mối quan hệ
                                    ->disabled() // Không cho phép chỉnh sửa
                                    ->dehydrated(false); // Không gửi dữ
                            }

                            return $fields;
                        })
                        ->modalHeading('Xác thực tài khoản')
                        ->modalButton('Cập nhật'),

                    Tables\Actions\DeleteAction::make(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),

                    BulkAction::make('Gửi mail')
                        ->icon('heroicon-o-envelope')
                        ->color('primary')
                        ->form([
                            Textarea::make('subject')
                                ->label('Tiêu đề email')
                                ->required()
                                ->placeholder('Nhập tiêu đề email...'),

                            RichEditor::make('content')
                                ->label('Nội dung email')
                                ->required()
                                ->placeholder('Nhập nội dung email...'),
                        ])
                        ->action(function (Collection $records, array $data) {
                            $subject = $data['subject'];
                            $content = $data['content'];

                            $records->where('status', 1)->each(function ($record) use ($subject, $content) {
                                dispatch(new SendNewsletterEmail($record->user->email, $subject, $content));
                            });
                            Notification::make()
                                ->title('Đã gửi mail cho ứng viên  thành công!')
                                ->success()
                                ->send();
                        })
                        ->deselectRecordsAfterCompletion(),
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

