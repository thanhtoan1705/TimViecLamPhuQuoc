<?php

namespace App\Filament\Resources\JobPost;

use App\Filament\Resources\JobPost\JobPostResource\Pages;
use App\Filament\Resources\JobPost\JobPostResource\RelationManagers;
use App\Models\Job_post;
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
use Illuminate\Support\Str;

class JobPostResource extends Resource
{
    protected static ?string $model = Job_post::class;

    protected static ?string $navigationLabel = 'Bài đăng vệc làm';

    protected static ?string $modelLabel = 'Bài đăng vệc làm';
    protected static ?string $navigationGroup = 'Công việc';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3) // Thay đổi lưới thành 3 cột để dễ dàng điều chỉnh tỷ lệ
                ->schema([
                    // Cột bên trái (chiếm 2/3 của lưới)
                    Grid::make(2)->schema([
                        Section::make('Thông tin bài viết')
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
                                    ->unique(Job_post::class, 'slug', ignoreRecord: true)
                                    ->maxLength(255)
                                    ->label('Slug'),
                                Forms\Components\MarkdownEditor::make('description')
                                    ->label('Mô tả công việc')->placeholder('Vui lòng nhập mô tả công việc'),
                                Forms\Components\Select::make('major_id')
                                    ->required()
                                    ->relationship('major', 'name')
                                    ->placeholder('Vui lòng chọn tên chuyên ngành')
                                    ->label('Tên chuyên ngành'),
                                Forms\Components\Select::make('employer_id')
                                    ->required()
                                    ->relationship('employer', 'company_name')
                                    ->placeholder('Vui lòng chọn tên nhà tuyển dụng')
                                    ->label('Tên nhà tuyển dụng'),
                                Forms\Components\Select::make('experience_id')
                                    ->required()
                                    ->relationship('experience', 'name')
                                    ->placeholder('Vui lòng chọn số năm kinh nghiệm')
                                    ->label('Kinh nghiệm'),
                                Forms\Components\Select::make('job_category_id')
                                    ->required()
                                    ->relationship('job_category', 'name')
                                    ->placeholder('Vui lòng chọn tên danh mục')
                                    ->label('Tên danh mục'),
                                Forms\Components\Select::make('job_type_id')
                                    ->required()
                                    ->relationship('job_type', 'name')
                                    ->placeholder('Vui lòng chọn loại công việc')
                                    ->label('Loại công việc'),
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
                    ])->columnSpan(2), // Cột này chiếm 2 phần của lưới

                    // Cột bên phải (chiếm 1/3 của lưới)
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
                                TextInput::make('address')
                                    ->required()
                                    ->label('Địa chỉ')->placeholder('Vui lòng nhập địa chỉ'),
                            ]),
                        Section::make('Trạng thái')->schema([
                            Forms\Components\Toggle::make('status')
                                ->label('Trạng thái'),
                        ])->label('Hiển thị'),
                        Section::make('Premium')->schema([
                            Forms\Components\Toggle::make('premium')
                                ->label('Premium'),
                        ]),
                    ])->columnSpan(1), // Cột này chiếm 1 phần của lưới

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
            'index' => Pages\ListJobPosts::route('/'),
            'create' => Pages\CreateJobPost::route('/create'),
            'edit' => Pages\EditJobPost::route('/{record}/edit'),
        ];
    }
}
