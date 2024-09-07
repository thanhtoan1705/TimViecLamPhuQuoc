<?php

namespace App\Filament\Resources\Employer\Interview;

use App\Filament\Resources\Employer\Interview\InterviewResource\Pages;
use App\Models\Interview;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Columns\TextColumn;
use App\Models\Candidate;

class InterviewResource extends Resource
{
    protected static ?string $model = Interview::class;

    protected static ?string $navigationLabel = 'Lịch phỏng vấn';

    protected static ?string $modelLabel = 'Lịch phỏng vấn';

    protected static ?string $navigationGroup = 'Sự kiện';

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function getNavigationBadge(): ?string
    {
        $employerId = Auth::user()->employer->id;

        if ($employerId) {
            // Giả sử mô hình của bạn có cột `employer_id`
            return static::getModel()::where('employer_id', $employerId)->count();
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
                        Grid::make(3)->schema([
                            Section::make('Thông tin lịch phỏng vấn')
                                ->schema([
                                    Grid::make(2)->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->label('Tiêu đề')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('phone')
                                            ->label('Số điện thoại')
                                            ->required(),
                                        Forms\Components\TextInput::make('email')
                                            ->label('Email')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('location')
                                            ->label('Địa điểm')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\Hidden::make('employer_id')
                                            ->default(Auth::user()->employer->id),
                                        Forms\Components\Select::make('job_id')
                                            ->required()
                                            ->searchable()
                                            ->preload()
                                            ->label('Tên bài đăng việc làm')
                                            ->placeholder('Vui lòng chọn bài đăng việc làm')
                                            ->relationship('job_post', 'title', function (Builder $query) {
                                                // Lọc job_post theo employer_id của nhà tuyển dụng đang đăng nhập
                                                $query->where('employer_id', Auth::user()->employer->id);
                                            }),
                                        Forms\Components\ColorPicker::make('color')
                                            ->label('Màu sắc')
                                            ->required(),

                                        Forms\Components\DateTimePicker::make('start_at')
                                            ->label('Thời gian')
                                            ->required(),
                                        Forms\Components\DateTimePicker::make('end_at')
                                            ->label('Kết thúc')
                                            ->required(),


                                    ]),


                                    Grid::make(1)->schema([

                                        Forms\Components\Select::make('job_post_candidates')
                                            ->label('Ứng viên')
                                            ->multiple()
                                            ->searchable()
                                            ->preload()
                                            ->options(function (callable $get) {
                                                $jobId = $get('job_id');

                                                if ($jobId) {
                                                    // Lấy danh sách ứng viên đã ứng tuyển cho job_id hiện tại
                                                    $candidates = \App\Models\Candidate::whereHas('jobPostsAppliedTo', function ($query) use ($jobId) {
                                                        $query->where('job_post_id', $jobId);
                                                    })
                                                        ->with('user')
                                                        ->get()
                                                        ->mapWithKeys(function ($candidate) {
                                                            return [$candidate->id => $candidate->user->name . ' (' . $candidate->user->email . ' - ' . $candidate->user->phone . ')'];
                                                        });

                                                    // Kiểm tra nếu không có ứng viên nào, trả về thông báo "Chưa có ứng viên"
                                                    if ($candidates->isEmpty()) {
                                                        return ['' => 'Chưa có ứng viên'];
                                                    }

                                                    return $candidates;
                                                }

                                                return ['' => 'Chọn bài đăng việc làm trước']; // Thông báo yêu cầu chọn bài đăng
                                            })
                                            ->placeholder('Chọn các ứng viên'),

                                            Toggle::make('status')->label('Trạng thái'),

                                        Forms\Components\RichEditor::make('note')
                                            ->label('Mô tả (nếu có)')
                                            ->maxLength(255),
                                    ]),
                                ]),


                        ]),


                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        if(isset(Auth::user()->employer->id)) {
            $employerId = Auth::user()->employer->id;
        }else {
            $employerId = '';
        }

        return $table
            ->defaultSort('created_at', 'desc')
            ->modifyQueryUsing(function (Builder $query) use ($employerId) {
                $query->where('employer_id', $employerId);
            })
            ->columns([
                TextColumn::make('name')
                    ->label('Tiêu đề')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('job_post.title')
                    ->label('Bài đăng việc làm')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('location')
                    ->label('Địa điểm')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('start_at')
                    ->label('Thời gian bắt đầu')
                    ->dateTime('H:i:s d/m/Y'),
                TextColumn::make('end_at')
                    ->label('Thời gian kết thúc')
                    ->dateTime('H:i:s d/m/Y'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListInterviews::route('/'),
            'create' => Pages\CreateInterview::route('/create'),
            'edit' => Pages\EditInterview::route('/{record}/edit'),
        ];
    }
}
