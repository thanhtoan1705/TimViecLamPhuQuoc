<?php

namespace App\Filament\Resources\Admin\JobPost;

use App\Filament\Resources\Admin\JobPost\JobPostResource\RelationManagers;
use App\Models\JobPost;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
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
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class JobPostResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = JobPost::class;

    protected static ?string $slug = 'job-posts';

    protected static ?string $navigationLabel = 'Bài đăng vệc làm';

    protected static ?string $modelLabel = 'Bài đăng vệc làm';
    protected static ?string $navigationGroup = 'Công việc';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

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

//Forms\Components\Select::make('employer_id')
//->required()
//->relationship('employer', 'company_name')
//->placeholder('Vui lòng chọn tên nhà tuyển dụng')
//->label('Tên nhà tuyển dụng'),

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([
                        Grid::make(2)->schema([

                            Section::make('Thông tin công việc')
                                ->schema([
                                    Grid::make(2)->schema([
//                                        Forms\Components\Hidden::make('employer_id')
//                                            ->default(Auth::user()->employer->id),
                                        Forms\Components\Hidden::make('start_date')
                                            ->default(now()),

                                        Forms\Components\Hidden::make('status')
                                            ->default(true),

                                        TextInput::make('title')
                                            ->required()
                                            ->maxLength(255)
                                            ->live(onBlur: true)
                                            ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                                            ->label('Tiêu đề bài đăng')->placeholder('Tuyển dụng nhân viên...'),
                                        TextInput::make('slug')
                                            ->required()
                                            ->dehydrated()
                                            ->unique(JobPost::class, 'slug', ignoreRecord: true)
                                            ->maxLength(255)
                                            ->label('Slug'),

                                        Forms\Components\Select::make('employer_id')
                                            ->required()
                                            ->relationship('employer', 'company_name')
                                            ->placeholder('Vui lòng chọn tên nhà tuyển dụng')
                                            ->label('Tên nhà tuyển dụng')
                                            ->searchable()
                                            ->preload()
                                            ->columnSpanFull(),

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
                                            ->placeholder('Chọn ngành nghề (tối đa 6)')
//                                        ->multiple()
                                            ->searchable()
                                            ->preload()
//                                        ->maxItems(6)
                                            ->label('Ngành nghề'),
//                                        Forms\Components\Select::make('major_id')
//                                            ->required()
//                                            ->relationship('majors', 'name')
//                                            ->placeholder('Chọn chuyên ngành')
//                                            ->searchable()
//                                            ->preload()
//                                            ->label('Chuyên ngành'),
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
                                            ->label('Mô tả công việc')
                                            ->placeholder('Mô tả chi tiết công việc để ứng viên hiểu rõ về yêu cầu của công ty với vị trí này. VD:
                                            - Kiểm tra các order trước khi thanh toán, trực tiếp thực hiện quá trình thanh toán.
                                            - Các công việc khác theo yêu cầu của quản lý.')
                                            ->columnSpanFull(),


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
                                            ->default(1)
                                            ->searchable()
                                            ->preload(),
                                        Forms\Components\Select::make('degree_id')
                                            ->required()
                                            ->placeholder('Vui lòng chọn bằng cấp')
                                            ->relationship('degree', 'name')
                                            ->default(1)
                                            ->label('Yêu cầu bằng cấp')
                                            ->searchable()
                                            ->preload(),

                                        Forms\Components\Select::make('gender')
                                            ->label('Giới tính')
                                            ->options([
                                                'Nam' => 'Nam',
                                                'Nữ' => 'Nữ',
                                                'Không yêu cầu' => 'Không yêu cầu',
                                            ])
                                            ->default('Không yêu cầu')
                                            ->required()
                                            ->placeholder('Chọn giới tính')
                                            ->searchable()
                                            ->preload(),
                                        Forms\Components\RichEditor::make('job_requirement')
                                            ->label('Yêu cầu tuyển dụng')
                                            ->required()
                                            ->toolbarButtons([])
                                            ->maxLength(1000)
                                            ->placeholder('- Số lượng: 02 (Nam/Nữ).
                                        - Thời gian làm việc 8 tiếng/ngày.
                                        - Giao tiếp tiếng Anh cơ bản.')
                                            ->columnSpanFull(),

                                    ]),
                                ]),

                            Section::make('Yêu cầu hồ sơ')
                                ->schema([
                                    Forms\Components\RichEditor::make('cv_requirement')
                                        ->label('Giới hạn 1.000 ký tự')
                                        ->required()
                                        ->toolbarButtons([])
                                        ->maxLength(1000)
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
                                            ->label( 'Ứng tuyển online qua email:')
                                            ->default(auth()->user()->email)
                                            ->maxLength(255)
                                            ->required(),

                                        TextInput::make('phone')
                                            ->label('Ứng viên có thể liên hệ qua hotline:')
                                            ->default(auth()->user()->phone)
                                            ->maxLength(50)
                                            ->required(),

                                        TextInput::make('department')
                                            ->label( 'Người liên hệ')
                                            ->default('Phòng nhân sự')
                                            ->maxLength(255)
                                            ->required(),

                                        TextInput::make('address')
                                            ->label('Đia chỉ liên hệ')
                                            ->maxLength(255)
                                            ->required(),
                                    ]),
                                ]),

                            Section::make('SEO')->schema([
                                Grid::make(2)->schema([
                                    TextInput::make('meta_title')
                                        ->placeholder('Vui lòng nhập Meta Title')
                                        ->label('Meta Title'),
                                    TextInput::make('meta_keyword')
                                        ->placeholder('Vui lòng nhập Meta Keyword')
                                        ->label('Meta Keyword'),
                                    TextInput::make('meta_description')
                                        ->placeholder('Vui lòng nhập Meta Description')
                                        ->label('Meta Description')
                                        ->columnSpanFull(),
                                ]),
                            ]),
                        ])->columnSpan(3),


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
//                    ->getStateUsing(function ($rowLoop, $record, $livewire) {
//                        // Lấy số bản ghi mỗi trang (pagination)
//                        $recordsPerPage = $livewire->getTableRecordsPerPage();
//
//                        // Lấy số trang hiện tại
//                        $currentPage = $livewire->getTable()->getPaginator()->currentPage();
//
//                        // Tính toán số thứ tự
//                        return ($currentPage - 1) * $recordsPerPage + $rowLoop->index + 1;
//                    }),
                Tables\Columns\TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->limit(60),


                Tables\Columns\TextColumn::make('employer.company_name')
                    ->label('Nhà tuyển dụng')
                    ->limit(60),

                Tables\Columns\TextColumn::make('end_date')
                    ->label('Hạn nộp')
                    ->formatStateUsing(function ($state) {
                        return $state
                            ? Carbon::parse($state)->format('d/m/Y H:i')
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
                    ->label('Trạng thái'),


            ])
            ->filters([

//                // Lọc theo trạng thái hết hạn hoặc còn hạn
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
                            ->label('Hạn nộp')
                            ->searchable()
                            ->preload()
                            ->options([
                                'expired' => 'Hết hạn',
                                'valid' => 'Còn hạn',
                            ])
                    ]),

                Filter::make('employer_id')
                    ->label('Nhà tuyển dụng')
                    ->query(function (Builder $query, array $data) {
                        if ($data['value']) {
                            $query->where('employer_id', $data['value']);
                        }
                    })
                    ->form([
                        Select::make('value')
                            ->label('Tên nhà tuyển dụng')
                            ->searchable()
                            ->preload()
                            ->options(function () {
                                return \App\Models\Employer::all()->pluck('company_name', 'id');
                            }),
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

                Filter::make('title')
                    ->label('Tiêu đề')
                    ->query(function (Builder $query, array $data) {
                        if ($data['value']) {
                            $query->where('title', 'like', '%' . $data['value'] . '%'); // 'like' for partial matching
                        }
                    })
                    ->form([
                        TextInput::make('value')
                            ->label('Tiêu đề')
                            ->placeholder('Tìm kiếm theo tiêu đề')
                    ]),

            ],layout: FiltersLayout::Dropdown)

            ->actions([
                Tables\Actions\ActionGroup::make([
                    Action::make('redirect_to_url')
                        ->label('Xem chi tiết bài đăng')
                        ->url(fn ($record) => url("/{$record->slug}.html"))
                        ->icon('heroicon-o-link')
                        ->openUrlInNewTab(),
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
            'index' => \App\Filament\Resources\Admin\JobPost\JobPostResource\Pages\ListJobPosts::route('/'),
            'create' => \App\Filament\Resources\Admin\JobPost\JobPostResource\Pages\CreateJobPost::route('/create'),
            'edit' => \App\Filament\Resources\Admin\JobPost\JobPostResource\Pages\EditJobPost::route('/{record}/edit'),
        ];
    }
}
