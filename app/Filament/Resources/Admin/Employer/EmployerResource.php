<?php

namespace App\Filament\Resources\Admin\Employer;

use App\Filament\Resources\Admin\Employer\EmployerResource\Pages\CreateEmployer;
use App\Filament\Resources\Employer\EmployerResource\Pages;
use App\Filament\Resources\Employer\EmployerResource\RelationManagers;
use App\Jobs\Client\SendNewsletterEmail;
use App\Models\District;
use App\Models\Employer;
use App\Models\Province;
use App\Models\Ward;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployerResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Employer::class;

    protected static ?string $slug = 'business';

    protected static ?string $navigationLabel = 'Nhà tuyển dụng';

    protected static ?string $modelLabel = 'Nhà tuyển dụng';

    protected static ?string $navigationGroup = 'Tài khoản';

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
                                            ->label('Email')
                                            ->required()
                                            ->email()
//                                            ->unique('users', 'user.email', ignoreRecord: true)
                                            ->validationAttribute('email'),

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
                                            ->required(fn(Page $livewire) => ($livewire instanceof CreateEmployer))
                                            ->minLength(8),

                                        FileUpload::make('user.image')
                                            ->label('Ảnh đại diện')
                                            ->image(),
                                    ]),

                                Section::make('Thông tin nhà tuyển dụng')
                                    ->schema([
                                        TextInput::make('company_name')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                                if ($operation === 'create' || $operation === 'update') {
                                                    $slug = Str::slug($state);

                                                    // Kiểm tra nếu slug đã tồn tại
                                                    $slugExists = Employer::where('slug', $slug)->exists();

                                                    // Nếu slug đã tồn tại, thêm số vào cuối slug
                                                    $counter = 1;
                                                    $newSlug = $slug;

                                                    while ($slugExists) {
                                                        $newSlug = $slug . '-' . $counter;
                                                        $slugExists = Employer::where('slug', $newSlug)->exists();
                                                        $counter++;
                                                    }

                                                    // Cập nhật slug trong state
                                                    $set('slug', $newSlug);
                                                }
                                            })
                                            ->label('Tên công ty'),

                                        TextInput::make('slug')
                                            ->label('Đường dẫn')
                                            ->maxLength(255)
                                            ->unique(Employer::class, 'slug', ignoreRecord: true), // Đảm bảo tính duy nhất cho slug


                                        RichEditor::make('description')
                                            ->label('Mô tả')
                                            ->required(),
                                    ]),

                                Section::make('Quy mô công ty')
                                    ->schema([
                                        Grid::make(2)
                                            ->schema([
                                                DatePicker::make('since')
                                                    ->label('Ngày thành lập')
                                                    ->required()
                                                    ->rules(['before:today'])
                                                    ->validationAttribute('ngày thành lập')
                                                    ->default(now()),

                                                TextInput::make('tax_code')
                                                    ->label('Mã số thuế')
                                                    ->maxLength(15),

                                                TextInput::make('company_size')
                                                    ->label('Số nhân viên')
                                                    ->numeric(),


                                                Select::make('company_type')
                                                    ->label(__('Loại hình công ty'))
                                                    ->options([
                                                        'Công ty TNHH' => 'Công ty TNHH',
                                                        'Công ty Cổ phần' => 'Công ty Cổ phần',
                                                        'Doanh nghiệp tư nhân' => 'Doanh nghiệp tư nhân',
                                                        'Khác' => 'Khác',
                                                    ])
                                                    ->required()
                                            ]),
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

                                        Grid::make(2)
                                        ->schema([
                                            TextInput::make('latitude')
                                                ->label('Vĩ độ')
                                                ->default(fn(Page $livewire) => $livewire->latitude ?? 10.0452)
                                                ->dehydrated(true),

                                            TextInput::make('longitude')
                                                ->label('Kinh độ')
                                                ->default(fn(Page $livewire) => $livewire->longitude ?? 105.7469)
                                                ->dehydrated(true),
                                        ]),

                                        Placeholder::make('map')
                                        ->label('Bản đồ')
                                        ->view('livewire.admin.employer.map-component')

                                    ])
                                    ->columnSpanFull(),

        ])
                            ->columnSpan(2),

                        Grid::make(1)
                            ->schema([
                                Section::make('Logo công ty')
                                    ->schema([
                                        FileUpload::make('company_logo')
                                            ->label('Logo công ty')
                                            ->image()
//                                            ->required()
                                            ->disk('public')
                                            ->directory('images/employer/logo'),

                                        FileUpload::make('company_photo_cover')
                                            ->label('Ảnh bìa công ty')
                                            ->image()
//                                            ->required()
                                            ->disk('public')
                                            ->directory('images/employer/banner'),
                                    ]),

                                Section::make('Liên hệ')
                                    ->schema([
                                        TextInput::make('company_phone')
                                            ->label('Số điện thoại công ty')
//                                            ->required()
                                            ->maxLength(20),

                                        TextInput::make('facebook_url')
                                            ->label('Facebook')
                                            ->url(),

                                        TextInput::make('website_url')
                                            ->label('Website')
                                            ->url(),
                                    ]),

                                Section::make('Trạng thái')
                                    ->schema([
                                        Toggle::make('status')
                                            ->label('Hiển thị'),
//                                        TextInput::make('max_posts_per_day')
//                                            ->label('Giới hạn bài đăng')
//                                            ->numeric(),
                                    ]),

                                Section::make('Xác thực')
                                    ->schema([
                                        DateTimePicker::make('user.email_verified_at')
                                            ->label('Xác thực')
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
            ->query(
                Employer::whereHas('user', function ($query) {
                    $query->where('role', 'employer'); // Lọc role bạn muốn
                })
            )
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),

                ImageColumn::make('company_logo')
                    ->getStateUsing(fn($record) => getStorageImageUrl($record->company_logo, config('image.no-photo')))
                    ->label('Logo'),
                TextColumn::make('company_name')
                    ->label('Tên công ty')
                    ->limit(20)
                    ->searchable(),

                TextColumn::make('company_phone')->icon('heroicon-o-phone')
                    ->label('Điện thoại')
                    ->searchable(),
                TextColumn::make('user.email')->icon('heroicon-o-envelope')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('job_posts_count')
                    ->label('Số bài đăng')
                    ->counts('jobPosts'), // Đếm số lượng từ mối quan hệ `jobPosts`


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
                //
//                Tables\Filters\SelectFilter::make('address.province')->label('Bằng cấp')
//                    ->relationship('address', 'name')
//                    ->searchable()
//                    ->preload(),
            ])
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
                                    ->default(fn ($record) => $record->user->email) // Hiển thị email từ mối quan hệ
                                    ->disabled() // Không cho phép chỉnh sửa
                                    ->dehydrated(false), // Không gửi dữ liệu này vào request

                                TextInput::make('company_name')
                                    ->label('Tên công ty')
                                    ->default(fn ($record) => $record->company_name)
                                    ->disabled()
                                    ->dehydrated(false),
                            ];

                            if (empty($record->user->email_verified_at)) {
                                $fields[] = DateTimePicker::make('email_verified_at')
                                    ->label('Ngày giờ xác thực')
                                    ->required(); // Bắt buộc nhập
                            }else {
                                $fields[] = TextInput::make('email_verified_at')
                                    ->label('Ngày giờ xác thực (Tài khoản đã xác thực)')
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
                    Tables\Actions\DeleteBulkAction::make(),

                    BulkAction::make('Gửi mail nhà tuyển dụng')
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
                                ->default('
<p><strong>Tiêu đề:</strong> Thông báo về ứng viên nộp hồ sơ ứng tuyển - [Tên vị trí công việc]</p>

<p><strong>Nội dung:</strong></p>

<p>Kính gửi [USER_NAME],</p>

<p>Chúng tôi rất vui khi thông báo rằng có một ứng viên đã nộp hồ sơ ứng tuyển cho vị trí <strong>[Tên vị trí công việc]</strong> mà bạn đã đăng trên hệ thống của chúng tôi.</p>

<p><strong>Thông tin ứng viên:</strong></p>
<ul>
    <li><strong>Tên ứng viên:</strong> [Tên ứng viên]</li>
    <li><strong>Email:</strong> [Email ứng viên]</li>
    <li><strong>Số điện thoại:</strong> [Số điện thoại ứng viên]</li>
    <li><strong>Kinh nghiệm làm việc:</strong> [Kinh nghiệm làm việc của ứng viên]</li>
    <li><strong>Trình độ học vấn:</strong> [Trình độ học vấn của ứng viên]</li>
    <li><strong>Link hồ sơ (nếu có):</strong> [Link đến hồ sơ ứng viên]</li>
</ul>

<p><strong>Thông tin về công việc:</strong></p>
<ul>
    <li><strong>Vị trí tuyển dụng:</strong> [Tên vị trí công việc]</li>
    <li><strong>Mô tả công việc:</strong> [Mô tả ngắn gọn về công việc]</li>
    <li><strong>Yêu cầu:</strong> [Yêu cầu công việc]</li>
</ul>

<p>Chúng tôi hy vọng bạn sẽ tìm thấy ứng viên phù hợp cho vị trí của mình. Nếu bạn cần thêm thông tin hoặc muốn lên lịch phỏng vấn, vui lòng liên hệ với ứng viên qua email hoặc số điện thoại đã cung cấp.</p>

<p>Chúc bạn một ngày làm việc hiệu quả!</p>

<p>Trân trọng,</p>
<p><strong>[Chữ ký của website việc làm]</strong></p>
<p>[Thông tin liên hệ của website việc làm]</p>
<p>[Địa chỉ website]</p>
<p>[Email hỗ trợ]</p>
    ')
                                ->placeholder('Nhập nội dung email...')
                        ])
                        ->action(function (Collection $records, array $data) {
                            $subject = $data['subject'];
                            $content = $data['content'];

                            $records->where('status', 1)->each(function ($record) use ($subject, $content) {
                                // Thay thế các placeholder trong nội dung email
                                $content = str_replace('[USER_NAME]', $record->company_name, $content);
                                $content = str_replace('[Email ứng viên]', $record->user->email, $content);

                                // Gửi email
                                dispatch(new SendNewsletterEmail($record->user->email, $subject, $content));
                            });

                            Notification::make()
                                ->title('Đã gửi mail cho ứng viên thành công!')
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
            'index' => \App\Filament\Resources\Admin\Employer\EmployerResource\Pages\ListEmployers::route('/'),
            'create' => \App\Filament\Resources\Admin\Employer\EmployerResource\Pages\CreateEmployer::route('/create'),
            'edit' => \App\Filament\Resources\Admin\Employer\EmployerResource\Pages\EditEmployer::route('/{record}/edit'),
        ];
    }

    public static function query(): Builder
    {
        return Employer::query()->with('user');
    }



}
