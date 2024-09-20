<?php

namespace App\Filament\Resources\Employer\JobPost;

use App\Filament\Resources\Employer\JobPost\JobPostResource\RelationManagers;
use App\Models\JobPost;
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
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobPostResource extends Resource
{
    protected static ?string $model = JobPost::class;
    protected static ?string $navigationLabel = 'Danh sách tin đăng';

    protected static ?string $modelLabel = 'Tin tuyển dụng';
    protected static ?string $navigationGroup = 'Quản lý tin đăng';
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

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
        return $form
            ->schema([
                Grid::make(3)
                ->schema([
                    Grid::make(2)->schema([
                        Section::make('Thông tin tuyển dụng')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                                    ->label('Tên bài đăng')->placeholder('Vui lòng điền tên bài đăng'),
                                TextInput::make('slug')
                                    ->required()
                                    ->dehydrated()
                                    ->unique(JobPost::class, 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->label('Slug'),
                                Forms\Components\RichEditor::make('description')
                                    ->label('Mô tả công việc')->placeholder('Vui lòng nhập mô tả công việc'),
                                Forms\Components\Select::make('major_id')
                                    ->required()
                                    ->relationship('majors', 'name')
                                    ->placeholder('Vui lòng chọn tên chuyên ngành')
                                    ->label('Tên chuyên ngành'),

                                Forms\Components\Hidden::make('employer_id')
                                    ->default(Auth::user()->employer->id),

                                Forms\Components\Select::make('experience_id')
                                    ->required()
                                    ->relationship('experience', 'name')
                                    ->placeholder('Vui lòng chọn số năm kinh nghiệm')
                                    ->label('Kinh nghiệm'),
//                                    ->createOptionForm([
//                                        TextInput::make('name')
//                                            ->required()
//                                            ->maxLength(255)
//                                            ->live(onBlur: true)
//                                            ->afterStateUpdated(function ($state, Set $set) {
//                                                $slug = Str::slug($state);
//                                                $set('slug', $slug);
//                                            })
//                                            ->label('Tên kinh nghiệm')
//                                            ->validationAttribute('tên kinh nghiệm')
//                                            ->rules([
//                                                'unique:experiences,name'
//                                            ]),
//
//                                        TextInput::make('slug')
//                                            ->required()
//                                            ->maxLength(255)
//                                            ->dehydrated()
//                                            ->label('Đường dẫn')
//                                            ->rules([
//                                                'regex:/^[a-zA-Z0-9\-]+$/u',
//                                                'unique:experiences,slug',
//                                            ]),
//                                    ]),

                                Forms\Components\Select::make('job_category_id')
                                    ->required()
                                    ->relationship('job_category', 'name')
                                    ->placeholder('Vui lòng chọn tên danh mục')
                                    ->label('Tên danh mục'),

                                Forms\Components\Select::make('job_type_id')
                                    ->required()
                                    ->relationship('jobType', 'name')
                                    ->placeholder('Vui lòng chọn loại công việc')
                                    ->label('Loại công việc'),
                                Forms\Components\Select::make('skills')
                                    ->multiple()
                                    ->relationship('skills', 'name')
                                    ->placeholder('Vui lòng chọn kỹ năng')
                                    ->label('Kỹ năng')
                                    ->searchable()
                                    ->preload(),

                            ]),

                        Section::make('Chi tiết công việc')
                            ->schema([
                                Forms\Components\Select::make('rank_id')
                                    ->required()
                                    ->placeholder('Vui lòng chọn chức vụ')
                                    ->relationship('rank', 'name')
                                    ->label('Chức vụ'),
                                Forms\Components\Select::make('degree_id')
                                    ->required()
                                    ->placeholder('Vui lòng chọn bằng cấp')
                                    ->relationship('degree', 'name')
                                    ->label('Yêu cầu bằng cấp'),
                            ]),

                        Section::make('SEO')->schema([
                            TextInput::make('meta_title')
                                ->placeholder('Vui lòng nhập Meta Title')
                                ->label('Meta Title'),
                            TextInput::make('meta_keyword')
                                ->placeholder('Vui lòng nhập Meta Keyword')
                                ->label('Meta Keyword'),
                            TextInput::make('meta_description')
                                ->placeholder('Vui lòng nhập Meta Description')
                                ->label('Meta Description'),
                        ]),
                    ])->columnSpan(2),

                    Grid::make(1)->schema([
                        Section::make('Thời hạn đăng tuyển')->schema([
                            Forms\Components\DateTimePicker::make('start_date')
                                ->required()
                                ->label('Ngày đăng tuyển'),
                            Forms\Components\DateTimePicker::make('end_date')
                                ->required()
                                ->label('Hết hạn'),
                        ]),
                        Section::make('Thông tin bổ sung')
                            ->schema([
                                TextInput::make('salary_min')
                                    ->numeric()
                                    ->label('Mức lương tối thiểu')->placeholder('Vui lòng nhập mức lương tối thiểu'),
                                TextInput::make('salary_max')
                                    ->numeric()
                                    ->label('Mức lương tối đa')->placeholder('Vui lòng nhập mức lương tối đa'),
                                TextInput::make('quantity')
                                    ->numeric()
                                    ->label('Số lượng')->placeholder('Vui lòng nhập số lượng'),
                                Forms\Components\Select::make('salary_id')
                                    ->required()
                                    ->placeholder('Vui lòng chọn bằng cấp')
                                    ->relationship('salary', 'name')
                                    ->label('Khoảng lương'),
                                TextInput::make('address')
                                    ->required()
                                    ->label('Địa chỉ')->placeholder('Vui lòng nhập địa chỉ'),
                            ]),

                    ])->columnSpan(1),

                ]),
            ]);
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
                Tables\Columns\TextColumn::make('title')->label('Tên')->searchable(),
                Tables\Columns\TextColumn::make('experience.name')->label('Kinh nghiệm')->searchable(),
                Tables\Columns\TextColumn::make('rank.name')->label('Chức vụ')->searchable(),


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
                    Tables\Actions\RestoreAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
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
