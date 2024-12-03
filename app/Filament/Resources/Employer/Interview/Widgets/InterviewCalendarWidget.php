<?php

namespace App\Filament\Resources\Employer\Interview\Widgets;

use App\Models\Interview;
use App\Models\JobPost;
use App\Services\ZoomService;
use Filament\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Builder;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms;
use Saade\FilamentFullCalendar\Actions;
use Filament\Actions\ViewAction;
use Illuminate\Support\Facades\Auth;

class InterviewCalendarWidget extends FullCalendarWidget
{
    public Model | string | null $model = Interview::class;
    public $employerId;

    public function __construct()
    {
        $this->employerId = Auth::user()->employer->id;
    }

    public function config(): array
    {
        return [
            'firstDay' => 1,
            'headerToolbar' => [
                'left' => 'dayGridMonth,dayGridWeek,dayGridDay',
                'center' => 'title',
                'right' => 'prev,next today',
            ],
        ];
    }

    public function fetchEvents(array $fetchInfo): array
    {
        return Interview::query()
            ->where('start_time', '>=', $fetchInfo['start'])
            ->where('employer_id', $this->employerId)
            ->get()
            ->map(
                fn (Interview $interview) => [
                    'id' => $interview->id,
                    'title' => $interview->title,
                    'start' => $interview->start_time,
                    'end' => $interview->start_time->copy()->addMinutes($interview->duration),
                    'color' => $interview->color,
                    'extendedProps' => [
                        'type' => $interview->interview_type,
                        'zoom_join_url' => $interview->zoom_join_url,
                        'zoom_start_url' => $interview->zoom_start_url,
                    ]
                ]
            )
            ->all();
    }

    public function getFormSchema(): array
    {
        return [
            Grid::make(3)->schema([
                Section::make('Thông tin lịch phỏng vấn')->schema([
                    Grid::make(2)->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Tiêu đề')
                            ->required(),

                        Forms\Components\TextInput::make('contact_phone')
                            ->label('Số điện thoại')
                            ->required(),

                        Forms\Components\TextInput::make('contact_email')
                            ->label('Email')
                            ->required(),

                        Forms\Components\Select::make('interview_type')
                            ->label('Hình thức phỏng vấn')
                            ->options([
                                'online' => 'Phỏng vấn online',
                                'offline' => 'Phỏng vấn trực tiếp',
                            ])
                            ->required()
                            ->reactive(),

                        Forms\Components\TextInput::make('location')
                            ->label('Địa điểm')
                            ->required()
                            ->hidden(fn (\Filament\Forms\Get $get): bool =>
                                $get('interview_type') !== 'offline'
                            ),

                        Forms\Components\DateTimePicker::make('start_time')
                            ->label('Thời gian bắt đầu')
                            ->required(),

                        Forms\Components\TextInput::make('duration')
                            ->label('Thời lượng (phút)')
                            ->numeric()
                            ->required()
                            ->default(30),

                        Forms\Components\ColorPicker::make('color')
                            ->label('Màu sắc'),

                        Forms\Components\Select::make('job_post_id')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->label('Tên bài đăng việc làm')
                            ->placeholder('Vui lòng chọn bài đăng việc làm')
                            ->relationship('job_post', 'title', function (Builder $query) {
                                $query->where('employer_id', Auth::user()->employer->id);
                            }),

                        Forms\Components\Select::make('job_post_candidates')
                            ->label('Ứng viên')
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->options(function (callable $get) {
                                $jobPostId = $get('job_post_id');

                                if ($jobPostId) {
                                    return \App\Models\Candidate::whereHas('jobPostsAppliedTo', function ($query) use ($jobPostId) {
                                        $query->where('job_post_id', $jobPostId);
                                    })
                                    ->with('user')
                                    ->get()
                                    ->mapWithKeys(function ($candidate) {
                                        return [
                                            $candidate->id => $candidate->user->name . ' (' . $candidate->user->email . ' - ' . $candidate->user->phone . ')'
                                        ];
                                    });
                                }

                                return [];
                            })
                            ->placeholder('Chọn các ứng viên'),

                        Forms\Components\RichEditor::make('description')
                            ->label('Mô tả')
                            ->columnSpan('full'),
                    ]),
                ]),
            ]),
        ];
    }

    protected function headerActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Thêm lịch phỏng vấn'),
        ];
    }

    protected function viewAction(): Action
    {
        return Actions\ViewAction::make()
            ->modalFooterActions(fn (ViewAction $action) => [
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
                $action->getModalCancelAction()
            ]);
    }

    protected function modalActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->using(function (array $data): Model {
                    // Thêm employer_id vào data
                    $data['employer_id'] = $this->employerId;

                    // Tạo interview mới
                    $interview = Interview::create($data);

                    // Xử lý candidates nếu có
                    if (isset($data['job_post_candidates'])) {
                        $interview->candidates()->sync($data['job_post_candidates']);
                    }

                    // Xử lý Zoom meeting nếu là phỏng vấn online
                    if ($data['interview_type'] === 'online') {
                        $zoomService = app(ZoomService::class);
                        try {
                            $meetingData = [
                                'topic' => $data['title'],
                                'type' => 2,
                                'start_time' => $data['start_time'],
                                'duration' => $data['duration'],
                                'timezone' => 'Asia/Ho_Chi_Minh',
                            ];

                            $zoomMeeting = $zoomService->createMeeting($meetingData);

                            $interview->update([
                                'zoom_meeting_id' => $zoomMeeting['id'],
                                'zoom_password' => $zoomMeeting['password'],
                                'zoom_join_url' => $zoomMeeting['join_url'],
                                'zoom_start_url' => $zoomMeeting['start_url'],
                            ]);
                        } catch (\Exception $e) {
                            \Log::error('Zoom Meeting Creation Error: ' . $e->getMessage());
                        }
                    }

                    return $interview;
                })
                ->mountUsing(
                    function (Forms\Form $form, array $arguments) {
                        $form->fill([
                            'employer_id' => $this->employerId,
                            'start_time' => $arguments['start'] ?? null,
                            'duration' => 30,
                        ]);
                    }
                ),
            Actions\EditAction::make()
                ->mountUsing(
                    function (Interview $record, Forms\Form $form, array $arguments) {
                        $form->fill([
                            'employer_id' => $this->employerId,
                            'title' => $record->title,
                            'contact_phone' => $record->contact_phone,
                            'contact_email' => $record->contact_email,
                            'interview_type' => $record->interview_type,
                            'location' => $record->location,
                            'job_post_id' => $record->job_post_id,
                            'job_post_candidates' => $record->candidates->pluck('id'),
                            'description' => $record->description,
                            'color' => $record->color,
                            'start_time' => $arguments['event']['start'] ?? $record->start_time,
                            'duration' => $record->duration
                        ]);
                    }
                ),
            Actions\DeleteAction::make(),
        ];
    }

    public function eventDidMount(): string
    {
        return <<<JS
            function({ event, timeText, isStart, isEnd, isMirror, isPast, isFuture, isToday, el, view }){
                el.setAttribute("x-tooltip", "tooltip");
                el.setAttribute("x-data", "{ tooltip: '"+event.title+"' }");
            }
        JS;
    }
}
