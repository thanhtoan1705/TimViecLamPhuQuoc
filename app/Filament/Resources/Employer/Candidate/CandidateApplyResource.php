<?php

namespace App\Filament\Resources\Employer\Candidate;

use App\Filament\Resources\Employer\Candidate\CandidateApplyResource\Pages;
use App\Jobs\Employer\SendMailStatusApplyNotification;
use App\Models\JobPost;
use App\Models\JobPostCandidate;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;


class CandidateApplyResource extends Resource
{
    protected static ?string $model = JobPostCandidate::class;

    protected static ?string $slug = 'candidate-applies';

    protected static ?string $navigationLabel = 'Hồ sơ ứng tuyển';

    protected static ?string $modelLabel = 'Hồ sơ ứng tuyển';

    protected static ?string $navigationGroup = 'Quản lý ứng viên';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Cấu hình form ở đây nếu cần
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([


                Tables\Columns\TextColumn::make('candidate.user.name')
                    ->label('Tên ứng viên')
                    ->limit('40')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jobPost.title')
                    ->label('Bài đăng')
                    ->limit('40')
                    ->searchable(),

                Tables\Columns\TextColumn::make('candidate_info')
                    ->label('Thông tin liên hệ')
                    ->getStateUsing(function ($record) {
                        return $record->candidate->user->phone . ' - ' . $record->candidate->user->email;
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày nộp HS')
                    ->extraAttributes(['style' => 'font-weight: bold;'])
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('viewed')
                    ->label('Trạng thái')
                    ->getStateUsing(function ($record) {
                        return $record->viewed ? 'Đã xem' : 'Chưa xem';
                    })
                    ->icon(function ($record) {
                        return $record->viewed ? 'heroicon-o-eye' : 'heroicon-o-eye-slash';
                    })
                    ->color(function ($record) {
                        // Chọn màu sắc dựa trên trạng thái
                        return $record->viewed ? 'success' : 'danger';
                    })
                    ->sortable() // Thêm khả năng sắp xếp
                    ->html(),




//                Tables\Columns\SelectColumn::make('status')
//                    ->label('Tình trạng hồ sơ')
//                    ->options([
//                        '1' => 'Phỏng vấn',
//                        '2' => 'Trúng tuyển',
//                        '3' => 'Từ chối',
//                    ])
//                    ->sortable()
//                    ->afterStateUpdated(function ($state, $record) {
//                        $record->status = $state;
//                        $record->save();
//
//                        $statusLabels = [
//                            '1' => 'Phỏng vấn',
//                            '2' => 'Trúng tuyển',
//                            '3' => 'Từ chối',
//                        ];
//
//                        $newStatus = $statusLabels[$record->status] ?? 'Không xác định';
//
//                        $candidate = $record->candidate->user;
//                        $candidate->notify(new \App\Notifications\CandidateStatusChanged($record));
//
//                        try {
//                            Mail::to($candidate->email)->send(new \App\Mail\CandidateStatusMail($record));
//                        } catch (\Exception $e) {
//                            \Log::error('Failed to send email: ' . $e->getMessage());
//                            Notification::make()
//                                ->title('Lỗi gửi email')
//                                ->body('Có lỗi xảy ra khi gửi email thông báo.')
//                                ->danger()
//                                ->send();
//                            return;
//                        }
//                        Notification::make()
//                            ->title('Trạng thái đã được cập nhật')
//                            ->body('Trạng thái của ứng viên đã được thay đổi thành ' . $newStatus)
//                            ->success()
//                            ->send();
//                    }),

            ])
            ->actions([
                ActionGroup::make([
                    // ...

                    Action::make('viewDetails')
                        ->label('Xem chi tiết')
                        ->url(fn($record) => static::getUrl('view', ['record' => $record->id]))
                        ->action(function ($record) {
                            $record->viewed = true;
                            $record->save();
                        })
                        ->icon('heroicon-o-eye')
                        ->openUrlInNewTab(),


                Action::make('Gửi mail - ứng viên')
                    ->icon('heroicon-o-envelope')
                    ->color('primary')
                    ->form(fn ($record) => [
                        Textarea::make('subject')
                            ->label('Tiêu đề email')
                            ->required()
                            ->placeholder('Nhập tiêu đề email...'),

                        Select::make('status')
                            ->label('Trạng thái ứng tuyển')
                            ->required()
                            ->options([
                                'interview' => 'Phỏng vấn',
                                'accepted' => 'Trúng tuyển',
                                'rejected' => 'Bị từ chối',
                            ])
                            ->live()
                            ->reactive()
                            ->searchable()
                            ->preload()
                            ->afterStateUpdated(function ($state, $set) use ($record) {

                                //Cho phép chọn thời gian nếu trạng thài là Trúng tuyển và Phỏng vấn
                                $set('interview_date', $state == 'interview' || $state == 'accepted' ? now() : null);

                                // Truy cập $record an toàn
                                if (!$record) {
                                    return;
                                }

                                $candidate = $record->candidate->user;
                                $employer = $record->jobPost->employer;
                                $jobPost = $record->jobPost;

                                $statusText = [
                                    'interview' => '
                                        Qua website <a href="https://vieclamphuquoc.com.vn" target="_blank">vieclamphuquoc.com.vn</a>, <strong>'.$employer->company_name.'</strong> đã nhận được hồ sơ ứng tuyển của bạn cho vị trí Lập trình Web PHP Laravel, Fullstack.
                                        <p>Chúng tôi rất cảm ơn bạn đã quan tâm đến nhu cầu tuyển dụng của công ty. Sau quá trình kiểm tra và chọn lọc hồ sơ, chúng tôi nhận thấy hồ sơ của bạn phù hợp cho vị trí này. Do vậy, công ty trân trọng mời bạn tham dự cuộc phỏng vấn.<p>
                                        <p>Vui lòng xác nhận lại sự có mặt của bạn qua email <strong>'.$employer->user->email.'</strong> hoặc SĐT <strong>'.$employer->company_phone.'</strong> trước chậm nhất 01 ngày để chúng tôi sắp xếp buổi phỏng vấn phù hợp cho bạn.</p>
                                        <p>Trường hợp bạn không thể thu xếp được thời gian, xin vui lòng liên hệ lại chúng tôi theo số điện thoại/địa chỉ trên để xác nhận lại.</p>
                                            ',

                                    'accepted' => 'bạn đã trúng tuyển vào vị trí <strong>'. $jobPost->title.'</strong>.
                                            Chúng tôi trân trọng mời bạn đến công ty để nhận việc.
                                            <p>Vui lòng xác nhận lại sự có mặt của bạn qua email <strong>'.$employer->user->email.'</strong> hoặc SĐT <strong>'.$employer->company_phone.'</strong> trước chậm nhất 01 ngày nhận việc để công ty sắp xếp công việc.</p>
                                            <p>Trường hợp bạn không thể thu xếp được thời gian, xin vui lòng liên hệ lại chúng tôi theo số điện thoại/địa chỉ trên để xác nhận lại.</p>.
                                            ',

                                    'rejected' => 'rất cảm ơn bạn đã quan tâm đến vị trí <strong>'. $jobPost->title.'</strong> mà chúng tôi đang tuyển dụng.
                                            <p>Chúng tôi đánh giá cao khả năng của bạn qua các vòng tuyển chọn. Tuy nhiên, chúng tôi nhận thấy bạn chưa thực sự thích hợp với vị trí công việc này.<br>Chúng tôi sẽ lưu giữ hồ sơ của bạn và nếu có vị trí tuyển dụng mới phù hợp trong tương lai, chúng tôi sẽ xem xét hồ sơ của bạn với sự ưu tiên cao hơn.
                                            Chúc bạn luôn thành công với những dự định của mình
                                            </p>',

                                ];

                                $set('content', '
<p>Xin chào: '.$candidate->name.'</p>
<p><strong>' . $employer->company_name . '</strong>. Xin thông báo: ' . ($statusText[$state] ?? '') . '</p>

');
                            }),

                        DateTimePicker::make('interview_date')
                            ->label(fn (callable $get) => match ($get('status')) {
                                'interview' => 'Thời gian hẹn phỏng vấn',
                                'accepted' => 'Thời gian nhận việc',
                                default => 'Ngày phỏng vấn',
                            })
                            ->minDate(now())
                            //Hiển thị thời gian nếu Phỏng vấn và Trúng tuyển
                            ->visible(fn (callable $get) => in_array($get('status'), ['accepted', 'interview']))
                            ->required(fn (callable $get) => in_array($get('status'), ['accepted', 'interview'])),






                        RichEditor::make('content')
                            ->label('Nội dung email')
                            ->required()
                            ->reactive()
                            ->placeholder('Nội dung sẽ tự động cập nhật...')
                            ->extraInputAttributes(['contentEditable' => 'false'])
                            ->default(function () use ($record) {
                                return '<p>Chọn trạng thái ứng tuyển để hiển thị nội dung email</p>';
                            })
                            ->extraAttributes(['style' => 'background-color: #e9ecef;'])
                            ->toolbarButtons([]),
                    ])
                    ->action(function ($record, array $data) {
                        $subject = $data['subject'];
                        $content = $data['content'];
                        $profileStatus = $data['status'];

                        $interviewDate = $data['interview_date'] ?? '';

                        $candidate = $record->candidate->user;

                        dispatch(new SendMailStatusApplyNotification($candidate->email, $subject, $content, $profileStatus, $interviewDate));

                        Notification::make()
                            ->title('Đã gửi mail cho ứng viên thành công!')
                            ->success()
                            ->send();
                    })
                    ->deselectRecordsAfterCompletion(),
                ])->button()
                ->label('Thao tác')

            ])
            ->bulkActions([
                // Các hành động hàng loạt nếu cần
            ])
            ->filters([
                Tables\Filters\Filter::make('EmployerJobPost')
                    ->label('Lọc theo bài đăng của tôi')
                    ->form([
                        Forms\Components\Select::make('job_post_id')
                            ->label('Chọn bài đăng công việc')
                            ->options(JobPost::where('employer_id', auth()->user()->employer->id)
                                ->pluck('title', 'id'))
                            ->searchable()
                    ])
                    ->query(function (Builder $query, array $data) {
                        $employerId = auth()->user()->employer->id;

                        if (!empty($data['job_post_id'])) {
                            return $query->whereHas('jobPost', function (Builder $query) use ($employerId, $data) {
                                $query->where('employer_id', $employerId)
                                    ->where('id', $data['job_post_id']);
                            });
                        }

                        // Nếu không chọn bài đăng, hiển thị tất cả ứng viên cho mọi bài đăng
                        return $query->whereHas('jobPost', function (Builder $query) use ($employerId) {
                            $query->where('employer_id', $employerId);
                        });
                    }),
                Filter::make('viewed')
                    ->label('Lọc theo trạng thái')
                    ->query(fn(Builder $query, array $data) => isset($data['value']) && $data['value'] !== ''
                        ? $query->where('viewed', $data['value'])
                        : $query
                    )
                    ->form([
                        Select::make('value')
                            ->label('Trạng thái')
                            ->placeholder('Chọn trạng thái...')
                            ->options([
                                0 => 'Chưa xem',
                                1 => 'Đã xem',
                            ])
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
            'index' => Pages\ListCandidateApply::route('/'),
            'view' => Pages\CandidateDetail::route('/{record}'),
        ];
    }

    public static function query(Builder $query): Builder
    {
        $employerId = auth()->user()->employer->id;

        return $query->whereHas('jobPost', function (Builder $query) use ($employerId) {
            $query->where('employer_id', $employerId);
        });
    }

}
