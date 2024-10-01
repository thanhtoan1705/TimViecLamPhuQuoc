<?php

namespace App\Filament\Resources\Admin\JobPost;

use App\Filament\Resources\Admin\JobPost\JobPostResource\RelationManagers;
use App\Models\JobPost;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobPostResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = JobPost::class;

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
                                        Forms\Components\Select::make('salary_id')
                                            ->required()
                                            ->placeholder('Vui lòng chọn bằng cấp')
                                            ->relationship('salary', 'name')
                                            ->label('Mức lương')
                                            ->searchable()
                                            ->preload(),
                                        TextInput::make('quantity')
                                            ->numeric()
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
                                        ->placeholder('- Đơn xin việc.
                                        - Sơ yếu lý lịch.
                                        - Hộ khẩu, chứng minh nhân dân và giấy khám sức khỏe.
                                        - Các bằng cấp có liên quan.
                                       '),

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
                Tables\Columns\TextColumn::make('title')->label('Tên')->searchable(),
                Tables\Columns\TextColumn::make('employer.company_name')->label('Tên công ty')->searchable(),
                Tables\Columns\TextColumn::make('major.name')->label('Chuyên ngành')->searchable(),
                Tables\Columns\TextColumn::make('experience.name')->label('Kinh nghiệm')->searchable(),
                Tables\Columns\TextColumn::make('rank.name')->label('Chức vụ')->searchable(),
                Tables\Columns\TextColumn::make('quantity')->label('Số lượng')->searchable()

            ])
            ->filters([
                Filter::make('title')
                    ->label('Lọc theo tên')
                    ->query(fn(Builder $query, array $data) => $query->where('title', 'like', '%' . $data['value'] . '%'))
                    ->form([
                        TextInput::make('value')
                            ->label('Tên kinh nghiệm')
                            ->placeholder('Nhập tên để lọc...')
                    ]),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
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
