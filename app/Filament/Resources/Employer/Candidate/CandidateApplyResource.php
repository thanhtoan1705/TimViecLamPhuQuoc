<?php

namespace App\Filament\Resources\Employer\Candidate;

use App\Filament\Resources\Employer\Candidate\CandidateApplyResource\Pages;
use App\Models\JobPost;
use App\Models\JobPostCandidate;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class CandidateApplyResource extends Resource
{
    protected static ?string $model = JobPostCandidate::class;

    protected static ?string $navigationLabel = 'Ứng viên ứng tuyển';

    protected static ?string $modelLabel = 'Ứng viên ứng tuyển';

    protected static ?string $navigationGroup = 'Ứng viên';

    protected static ?string $navigationIcon = 'heroicon-o-document-minus';

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
                Tables\Columns\TextColumn::make('stt')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->iteration),

                Tables\Columns\TextColumn::make('candidate.user.name')
                    ->label('Tên hồ sơ')
                    ->searchable()
                    ->html(),

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

                Tables\Columns\TextColumn::make('candidate_info')
                    ->label('Thông tin liên hệ')
                    ->getStateUsing(function ($record) {
                        return $record->candidate->user->phone . ' - ' . $record->candidate->user->email;
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày nộp HS')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\SelectColumn::make('status')
                    ->label('Tình trạng hồ sơ')
                    ->options([
                        '1' => 'Phỏng vấn',
                        '2' => 'Trúng tuyển',
                        '3' => 'Từ chối',
                    ])
                    ->sortable()
                    ->afterStateUpdated(function ($state, $record) {
                        $record->status = $state;
                        $record->save();

                        $statusLabels = [
                            '1' => 'Phỏng vấn',
                            '2' => 'Trúng tuyển',
                            '3' => 'Từ chối',
                        ];

                        $newStatus = $statusLabels[$record->status] ?? 'Không xác định';

                        $candidate = $record->candidate->user;
                        $candidate->notify(new \App\Notifications\CandidateStatusChanged($record));

                        try {
                            Mail::to($candidate->email)->send(new \App\Mail\CandidateStatusMail($record));
                        } catch (\Exception $e) {
                            \Log::error('Failed to send email: ' . $e->getMessage());
                            Notification::make()
                                ->title('Lỗi gửi email')
                                ->body('Có lỗi xảy ra khi gửi email thông báo.')
                                ->danger()
                                ->send();
                            return;
                        }
                        Notification::make()
                            ->title('Trạng thái đã được cập nhật')
                            ->body('Trạng thái của ứng viên đã được thay đổi thành ' . $newStatus)
                            ->success()
                            ->send();
                    }),

            ])
            ->actions([
                Tables\Actions\ButtonAction::make('viewDetails')
                    ->label('Xem chi tiết')
                    ->url(fn($record) => static::getUrl('view', ['record' => $record->id]))
                    ->action(function ($record) {
                        $record->viewed = true;
                        $record->save();
                    })
                    ->openUrlInNewTab(),
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
