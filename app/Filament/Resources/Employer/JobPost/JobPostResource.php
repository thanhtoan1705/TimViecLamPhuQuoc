<?php

namespace App\Filament\Resources\Employer\JobPost;

use App\Filament\Resources\Employer\JobPost\JobPostResource\RelationManagers;
use App\Models\BenefitJob;
use App\Models\Employer;
use App\Models\JobPost;
use App\Models\Notification;
use App\Models\UserJobPackage;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class JobPostResource extends Resource
{
    protected static ?string $model = JobPost::class;
    protected static ?string $slug = 'job-posts';
    protected static ?string $navigationLabel = 'Danh sách tin đăng';

    protected static ?string $modelLabel = 'Tin tuyển dụng';
    protected static ?string $navigationGroup = 'Quản lý tin đăng';
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    protected static bool $canCreateAnother = false;


    public static function getNavigationBadge(): ?string
    {
        $user = Auth::user();

        if ($user && $user->employer) {
            // Giả sử mô hình của bạn có cột `employer_id`
            return static::getModel()::where('employer_id', $user->employer->id)->count();
        }

        return null;
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'primary';
    }


    public static function form(Form $form): Form
    {
        $user = Auth::user();
        $employer = $user->employer;

        // Nếu không phải nhà tuyển dụng
        if (!$employer) {
            return $form->schema([
                Forms\Components\Placeholder::make('Thông báo')
                    ->content('Bạn không phải nhà tuyển dụng.'),
            ]);
        }

        // Lấy operation hiện tại
        $operation = $form->getOperation();

        // Kiểm tra nếu operation là 'create'
        if ($operation === 'create') {

            // Lấy tất cả các gói còn hạn và có remaining_posts > 0
            $jobPackages = UserJobPackage::where('employer_id', $employer->id)
                ->where('expires_at', '>=', now())
                ->where('remaining_posts', '>', 0)
                ->get();

            // Kiểm tra lượt đăng miễn phí trong ngày
            $today = now()->toDateString();
            $freePostToday = JobPost::where('employer_id', $employer->id)
                ->whereDate('created_at', $today)
                ->exists();

//            dd($freePostToday);

            // Kiểm tra nếu có ít nhất một gói hợp lệ
            if ($jobPackages->isNotEmpty()) {
                // Tìm gói có số bài đăng còn lại nhiều nhất
                $availablePackage = $jobPackages->sortByDesc('remaining_posts')->first();

                // Nếu có gói và còn bài đăng trong gói, hiển thị form tạo bài đăng
                if ($availablePackage && $availablePackage->remaining_posts > 0) {
                    return $form->schema(
                        static::formAddJobPost()
                    );
                }
            }

            // Nếu không còn gói hợp lệ và chưa sử dụng bài đăng miễn phí hôm nay
            if (!$freePostToday) {
                return $form->schema(
                    static::formAddJobPost()
                );
            } else {
                // Nếu không còn lượt đăng miễn phí và chưa có gói, yêu cầu mua gói
                return $form->schema(
                    static::notificationExpired(
                        fn() => new HtmlString('
                    Bạn đã sử dụng hết lượt đăng tin miễn phí hôm nay. Vui lòng mua gói vip để đăng nhiều tin hơn trong 1 ngày.
                    <br><br>
                    <a
                        href="'.route('filament.employer.resources.employer.buy-services.buy-services.index') .'"
                        target="_blank"
                        class="fi-btn-label"
                        style="margin-top: 20px; padding: 10px 20px; background-color: #2563eb; color: white; border-radius: 6px;">
                        Mua Gói Đăng Tin
                    </a>

                    <a
                        href="'.route('filament.employer.resources.employer.buy-services.buy-services.index') .'"

                        class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg  fi-btn-color-gray fi-color-gray fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-white text-gray-950 hover:bg-gray-50 dark:bg-white/5 dark:text-white dark:hover:bg-white/10 ring-1 ring-gray-950/10 dark:ring-white/20 [input:checked+&]:bg-gray-400 [input:checked+&]:text-white [input:checked+&]:ring-0 [input:checked+&]:hover:bg-gray-300 dark:[input:checked+&]:bg-gray-600 dark:[input:checked+&]:hover:bg-gray-500 fi-ac-action fi-ac-btn-action"
                        style="margin-top: 20px; margin-left: 10px; border-radius: 6px;">
                        Quay lại
                    </a>


                ')
                    )
                );
            }
        }

        // Nếu đang update (operation là "update"), hiển thị form bình thường
        return $form->schema(
            static::formAddJobPost()
        );
    }


//    public static function afterCreate(JobPost $record): void
//    {
//        $employerId = $record->employer_id;
//
//        $jobPackage = UserJobPackage::where('employer_id', $employerId)
//            ->where('expires_at', '>=', now())
//            ->first();
//
//        if ($jobPackage) {
//            $jobPackage->decrement('remaining_posts'); // Giảm số lượng bài đăng còn lại
//        }
//    }

    public static function formAddJobPost()
    {
        return [
            Grid::make(3)
                ->schema([
                    Grid::make(2)->schema([

                        Section::make('Thông tin công việc')
                            ->schema([
                                Grid::make(2)->schema([
                                    Forms\Components\Hidden::make('employer_id')
                                        ->default(Auth::user()->employer->id),

                                    Forms\Components\Hidden::make('start_date')
                                        ->default(now()),

                                    Forms\Components\Hidden::make('status')
                                        ->default(true),

                                    TextInput::make('title')
                                        ->required()
                                        ->maxLength(180)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                                        ->label('Tiêu đề bài đăng')->placeholder('Tuyển dụng nhân viên...')
                                        ->columnSpanFull(),
//                                        ->helperText(fn($get) => new HtmlString(
//                                            '<a href="' . route('client.job.single', ['jobSlug' => $get('slug')]) . '"
//                                                    target="_blank" style="color: #007bff;">
//                                                    ' . route('client.job.single', ['jobSlug' => $get('slug')]) . '
//                                                </a>'
//
//                                        )),
//                                        TextInput::make('slug')
//                                            ->required()
//                                            ->dehydrated()
//                                            ->unique(JobPost::class, 'slug', ignoreRecord: true)
//                                            ->maxLength(255)
//                                            ->label('Slug'),

                                    Forms\Components\Select::make('rank_id')
                                        ->required()
                                        ->placeholder('Cấp bậc')
                                        ->relationship('rank', 'name')
                                        ->label('Cấp bậc')
                                        ->searchable()
                                        ->preload()
                                        ->columnSpan(1),
                                    Forms\Components\Select::make('job_type_id')
                                        ->required()
                                        ->relationship('jobType', 'name')
                                        ->placeholder('Chọn loại hình công việc')
                                        ->label('Loại hình công việc')
                                        ->searchable()
                                        ->preload()
                                        ->columnSpan(1),
                                    Forms\Components\Select::make('job_category_id')
                                        ->required()
                                        ->relationship('job_category', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->label('Ngành nghề'),

                                    Forms\Components\Select::make('salary_id')
                                        ->required()
                                        ->placeholder('Vui lòng chọn bằng cấp')
                                        ->relationship('salary', 'name')
                                        ->label('Mức lương')
                                        ->searchable()
                                        ->preload(),
                                    TextInput::make('quantity')
                                        ->numeric()
                                        ->required()
                                        ->rule('min:1')
                                        ->label('Số lượng')
                                        ->placeholder('Vui lòng nhập số lượng'),
                                    Forms\Components\DateTimePicker::make('end_date')
                                        ->required()
                                        ->label('Hạn nộp hồ sơ (Tối đa 90 ngày)')
                                        ->minDate(now()) // Ngày nhỏ nhất là ngày hiện tại
                                        ->maxDate(Carbon::now()->addDays(90)),
                                    Forms\Components\RichEditor::make('description')
                                        ->label(fn() => new HtmlString('
                                            Mô tả công việc (Giới hạn <span style="font-weight: bold; color: #007bff;">2.000</span> ký tự).
                                        '))
                                        ->maxLength(2000)
                                        ->required()
                                        ->placeholder('Mô tả chi tiết công việc để ứng viên hiểu rõ về yêu cầu của công ty với vị trí này. VD:
                                            - Kiểm tra các order trước khi thanh toán, trực tiếp thực hiện quá trình thanh toán.
                                            - Các công việc khác theo yêu cầu của quản lý.')
                                        ->columnSpanFull()
                                        ->helperText(fn() => new HtmlString('
                                            Xem hướng dẫn chi tiết về cách viết mô tả công việc: <a href="" target="_blank" style="color: #007bff; text-decoration: underline;">Xem hướng dẫn</a>.
                                        '))
                                        ->toolbarButtons([]),
                                ]),
                            ]),

                        Section::make('Yêu cầu công việc')
                            ->schema([
                                Grid::make(3)->schema([
                                    Forms\Components\Select::make('experience_id')
                                        ->required()
                                        ->relationship('experience', 'name')
                                        ->placeholder('Vui lòng chọn số năm kinh nghiệm')
                                        ->label('Kinh nghiệm')
                                        ->searchable()
                                        ->preload(),
                                    Forms\Components\Select::make('degree_id')
                                        ->required()
                                        ->placeholder('Vui lòng chọn bằng cấp')
                                        ->relationship('degree', 'name')
                                        ->label('Yêu cầu bằng cấp')
                                        ->searchable()
                                        ->preload(),

                                    Forms\Components\Select::make('gender')
                                        ->label('Giới tính')
                                        ->options([
                                            'male' => 'Nam',
                                            'female' => 'Nữ',
                                            'not_required' => 'Không yêu cầu',
                                        ])
                                        ->required()
                                        ->placeholder('Chọn giới tính')
                                        ->searchable()
                                        ->preload(),
                                    Forms\Components\RichEditor::make('job_requirement')
                                        ->label(fn() => new HtmlString('
                                            Yêu cầu tuyển dụng (Giới hạn <span style="font-weight: bold; color: #007bff;">1.000</span> ký tự).
                                        '))
                                        ->maxLength(1000)
                                        ->required()
                                        ->placeholder('- Số lượng: 02 (Nam/Nữ).
                                        - Thời gian làm việc 8 tiếng/ngày.
                                        - Giao tiếp tiếng Anh cơ bản.')
                                        ->toolbarButtons([])
                                        ->columnSpanFull(),

                                ]),
                            ]),

                        Section::make('Yêu cầu hồ sơ')
                            ->schema([
                                Forms\Components\RichEditor::make('cv_requirement')
                                    ->label(fn() => new HtmlString('
                                            Giới hạn <span style="font-weight: bold; color: #007bff;">1.000</span> ký tự
                                        '))
                                    ->maxLength(1000)
                                    ->required()
                                    ->toolbarButtons([])
                                    ->placeholder('- Đơn xin việc.
                                        - Sơ yếu lý lịch.
                                        - Hộ khẩu, chứng minh nhân dân và giấy khám sức khỏe.
                                        - Các bằng cấp có liên quan.
                                       '),

                            ]),


                        Section::make('Chế độ phúc lợi')->schema([
                            Grid::make(3)->schema([

                                Checkbox::make('benefitJob.insurance')
                                    ->label('Chế độ bảo hiểm')->default(true),
                                Checkbox::make('benefitJob.annual_leave')->label('Nghỉ phép năm')->default(true),
                                Checkbox::make('benefitJob.uniform')->label('Đồng phục')->default(true),
                                Checkbox::make('benefitJob.salary_increase')->label('Tăng lương')->default(true),
                                Checkbox::make('benefitJob.bonus')->label('Chế độ thưởng'),
                                Checkbox::make('benefitJob.training')->label('Đào tạo'),

                                // Checkbox tiếp theo sẽ bị ẩn if `show_all` là false
                                Checkbox::make('benefitJob.allowance')->label('Phụ cấp')->hidden(fn ($get) => !$get('show_all')),
                                Checkbox::make('benefitJob.laptop')->label('Laptop')->hidden(fn ($get) => !$get('show_all')),
                                Checkbox::make('benefitJob.business_trip')->label('Công tác phí')->hidden(fn ($get) => !$get('show_all')),
                                Checkbox::make('benefitJob.travel')->label('Du lịch')->hidden(fn ($get) => !$get('show_all')),
                                Checkbox::make('benefitJob.seniority_allowance')->label('Phụ cấp thâm niên')->hidden(fn ($get) => !$get('show_all')),
                                Checkbox::make('benefitJob.healthcare')->label('Chăm sóc sức khoẻ')->hidden(fn ($get) => !$get('show_all')),
                                Checkbox::make('benefitJob.shuttle_bus')->label('Xe đưa đón')->hidden(fn ($get) => !$get('show_all')),
                                Checkbox::make('benefitJob.sports_club')->label('CLB thể thao')->hidden(fn ($get) => !$get('show_all')),
                                Checkbox::make('benefitJob.international_travel')->label('Du lịch nước ngoài')->hidden(fn ($get) => !$get('show_all')),


                                Toggle::make('show_all')
                                    ->label('Xem thêm')
                                    ->reactive()
                                    ->afterStateUpdated(function ($state) {
                                        // Lưu trạng thái của toggle nếu cần
                                    }),


                                Forms\Components\RichEditor::make('benefitJob.description')
                                    ->label(fn() => new HtmlString('
                                            Giới hạn <span style="font-weight: bold; color: #007bff;">1.000</span> ký tự
                                        '))
                                    ->maxLength(1000)
                                    ->toolbarButtons([])
                                    ->placeholder('- Mức lương: không dưới 10 triệu đồng/tháng
                                            - BHXH, BHYT đầy đủ
                                            - Được hưởng % hoa hồng dự án
                                       ')->columnSpanFull(),
                            ]),
                        ]),



                        Section::make('Cách nộp hồ sơ')
                            ->schema([
                                Grid::make(2)->schema([
                                    TextInput::make('email')
                                        ->label('Ứng tuyển online qua email:')
                                        ->default(auth()->user()->email)
                                        ->maxLength(255)
                                        ->required(),

                                    TextInput::make('phone')
                                        ->label('Ứng viên có thể liên hệ qua hotline:')
                                        ->default(auth()->user()->phone)
                                        ->maxLength(50)
                                        ->required(),

                                    TextInput::make('department')
                                        ->label('Người liên hệ')
                                        ->default('Phòng nhân sự')
                                        ->maxLength(255)
                                        ->required(),

                                    TextInput::make('address')
                                        ->label('Đia chỉ liên hệ')
                                        ->maxLength(255)
                                        ->required(),
                                ]),
                            ]),


                    ])->columnSpan(3),
                ])
        ];
    }


    public static function notificationExpired($notification) {
        return [
            Section::make('Thông báo')
                ->schema([
                    Forms\Components\Placeholder::make('')
                        ->content($notification)
                        ->extraAttributes(['class' => 'bg-warning text-dark p-3 rounded']),
                ])
        ];
    }

    public static function table(Table $table): Table
    {
        $employerId = Auth::user()->employer->id;
        return $table
            ->defaultSort('created_at', 'desc')
            ->modifyQueryUsing(function (Builder $query) use ($employerId) {
                $query->where('employer_id', $employerId);
            })
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),
                Tables\Columns\TextColumn::make('title')->label('Tiêu đề')->searchable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Hạn nộp')
                    ->formatStateUsing(function ($state) {
                        return $state
                            ? Carbon::parse($state)->format('d/m/Y H:i') // Format the date and time
                            : null;
                    })
                    ->color(function ($state) {
                        // Apply text color: Red (danger) if expired, Green (success) if valid
                        return Carbon::parse($state)->isPast() ? 'danger' : 'success';
                    })
                    ->description(function ($state) {
                        return Carbon::parse($state)->isPast()
                            ? 'Hết hạn'
                            : 'Còn hạn';
                    }),

                ToggleColumn::make('status')
                    ->label('Trạng thái hiển thị')
                    ->afterStateUpdated(function ($record, $state) {
                        // Runs after the state is saved to the database.
                    }),





            ])
            ->filters([

                // Lọc theo trạng thái hết hạn hoặc còn hạn
                Filter::make('end_date_status')
                    ->label('Lọc theo trạng thái hạn nộp')
                    ->query(function (Builder $query, array $data) {
                        if ($data['value'] === 'expired') {
                            // Filter for expired records
                            $query->whereDate('end_date', '<', now());
                        } elseif ($data['value'] === 'valid') {
                            // Filter for valid records
                            $query->whereDate('end_date', '>=', now());
                        }
                    })
                    ->form([
                        Select::make('value')
                            ->label('Trạng thái')
                            ->searchable()
                            ->preload()
                            ->options([
                                'expired' => 'Hết hạn',
                                'valid' => 'Còn hạn',
                            ])
                            ->placeholder('Chọn trạng thái hạn nộp')
                    ]),

                Filter::make('job_category_id')
                    ->label('Danh mục công việc')
                    ->query(function (Builder $query, array $data) {
                        if ($data['value']) {
                            $query->where('job_category_id', $data['value']);
                        }
                    })
                    ->form([
                        Select::make('value')
                            ->label('Danh mục')
                            ->searchable()
                            ->preload()
                            ->options(function () {
                                return \App\Models\Job_category::all()->pluck('name', 'id');
                            }),
                    ]),


                Filter::make('salary_id')
                    ->label('Mức lương')
                    ->query(function (Builder $query, array $data) {
                        if ($data['value']) {
                            $query->where('salary_id', $data['value']);
                        }
                    })
                    ->form([
                        Select::make('value')
                            ->label('Mức lương')
                            ->searchable()
                            ->preload()
                            ->options(function () {
                                return \App\Models\Salary::all()->pluck('name', 'id');
                            }),
                    ]),


            ] ,layout: FiltersLayout::Modal)
            ->actions([
                Action::make('editEndDate')
                    ->label('Gia hạn')
                    ->icon('heroicon-o-calendar')
                    ->action(function ($record, array $data) {
                        // Cập nhật end_date với dữ liệu mới
                        $record->update(['end_date' => $data['end_date']]);
                    })
                    ->form([
                        Forms\Components\DateTimePicker::make('end_date')
                            ->label('Hạn nộp hồ sơ')
                            ->required()
                            ->minDate(now())
                            ->maxDate(Carbon::now()->addDays(90)),
                    ])
                    ->modalHeading('Chỉnh sửa hạn nộp hồ sơ')
                    ->modalButton('Cập nhật'),

                Tables\Actions\ActionGroup::make([
                    Action::make('view_live')
                        ->label('Xem thực tế') // Đổi nhãn thành "Xem thực tế"
                        ->url(fn ($record) => route('client.job.single', ['jobSlug' => $record->slug])) // Tạo URL dựa vào slug của công việc
                        ->icon('heroicon-o-link') // Thêm biểu tượng
                        ->openUrlInNewTab(), // Mở liên kết trong tab mới

                    Tables\Actions\ViewAction::make()->modalWidth('xxl'),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),

                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => \App\Filament\Resources\Employer\JobPost\JobPostResource\Pages\ListJobPosts::route('/'),
            'create' => \App\Filament\Resources\Employer\JobPost\JobPostResource\Pages\CreateJobPost::route('/create'),
            'edit' => \App\Filament\Resources\Employer\JobPost\JobPostResource\Pages\EditJobPost::route('/{record}/edit'),
        ];
    }

}
