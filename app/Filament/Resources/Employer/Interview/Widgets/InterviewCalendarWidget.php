<?php

namespace App\Filament\Resources\Employer\Interview\Widgets;

use App\Models\Interview;
use App\Filament\Resources\Employer\Event\EventResource;
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
            ->where('start_at', '>=', $fetchInfo['start'])
            ->where('end_at', '<=', $fetchInfo['end'])
            ->where('employer_id', $this->employerId)
            ->get()
            ->map(
                fn (Interview $interview) => [
                    'id' => $interview->id,
                    'title' => $interview->name,
                    'start' => $interview->start_at,
                    'end' => $interview->end_at,
                    'color' => $interview->color,
//                     'url' => Interview::getUrl(name: 'edit', parameters: ['record' => $interview]),
//                     'shouldOpenUrlInNewTab' => true
                ]
            )
            ->all();
    }

    public function getFormSchema(): array
    {
        return [
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


                                ])->columnSpan(2),


                                Grid::make(1)->schema([
                                    Forms\Components\Select::make('job_post_candidates')
                                        ->label('Ứng viên')
                                        ->multiple()
                                        ->searchable()
                                        ->preload()
                                        ->options(function (callable $get) {
                                            $jobId = $get('job_id');

                                            if ($jobId) {
                                                return \App\Models\Candidate::whereHas('jobPostsAppliedTo', function ($query) use ($jobId) {
                                                    $query->where('job_post_id', $jobId);
                                                })
                                                    ->with('user') // Eager load user
                                                    ->get()
//                                                        ->pluck('user.name', 'id'); // Lấy tên từ bảng users
                                                    ->mapWithKeys(function ($candidate) {
                                                        // Trả về array có key là id và value là "name (email)"
                                                        return [$candidate->id => $candidate->user->name . ' (' . $candidate->user->email . ' - ' .$candidate->user->phone.')' ];
                                                    });
                                            }

                                            return [];
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
        ];
    }

    // Chú giải sự kiện khi di chuột
    public function eventDidMount(): string
    {
        return <<<JS
            function({ event, timeText, isStart, isEnd, isMirror, isPast, isFuture, isToday, el, view }){
                el.setAttribute("x-tooltip", "tooltip");
                el.setAttribute("x-data", "{ tooltip: '"+event.title+"' }");
            }
        JS;
    }

    //Tạo sự kiện với dữ liệu bổ sung
    protected function headerActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Thêm lịch phỏng vấn'),

        ];
    }

    // Custom khi click vào xem event
    protected function viewAction(): Action
    {
        return Actions\ViewAction::make()
            ->modalFooterActions (actions: fn (ViewAction $action) => [
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),

                $action->getModalCancelAction()
            ]);
    }

    protected function modalActions(): array
    {
        return [
            // Khi click hoặc kéo chuột để tạo sự kiện sẽ tự động chọn ngày
            Actions\CreateAction::make()
                ->mountUsing(
                    function (Forms\Form $form, array $arguments) {
                        $form->fill([
                            'employer_id' => $this->employerId,
                            'start_at' => $arguments['start'] ?? null,
                            'end_at' => $arguments['end'] ?? null,
                        ]);
                    }
                ),

            Actions\EditAction::make()
                ->mountUsing(
                    function (Interview $record, Forms\Form $form, array $arguments) {
                        $form->fill([
                            'employer_id' => $this->employerId,
                            'name' => $record->name,
                            'phone' => $record->phone,
                            'email' => $record->email,
                            'location' => $record->location,
                            'job_post_candidates' => $record->job_post_candidates,
                            'note' => $record->note,
                            'color' => $record->color,
                            'start_at' => $arguments['event']['start'] ?? $record->start_at,
                            'end_at' => $arguments['event']['end'] ?? $record->end_at
                        ]);
                    }
                ),
            Actions\DeleteAction::make(),
        ];
    }
}
