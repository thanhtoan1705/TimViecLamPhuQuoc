<?php

namespace App\Filament\Employer\Widgets;

use Filament\Widgets\Widget;
use App\Models\Event;
use App\Filament\Resources\Employer\Event\EventResource;
use Filament\Actions\Action;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms;
use Saade\FilamentFullCalendar\Actions;
use Filament\Actions\ViewAction;
use Illuminate\Support\Facades\Auth;

class CalendarWidget extends FullCalendarWidget
{
    public Model | string | null $model = Event::class;


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
        return Event::query()
            ->where('start_at', '>=', $fetchInfo['start'])
            ->where('end_at', '<=', $fetchInfo['end'])
            ->where('user_id', Auth::user()->id)
            ->get()
            ->map(
                fn (Event $event) => [
                    'id' => $event->id,
                    'title' => $event->title,
                    'start' => $event->start_at,
                    'end' => $event->end_at,
                    'color' => $event->color,
                    // 'url' => EventResource::getUrl(name: 'edit', parameters: ['record' => $event]),
                    // 'shouldOpenUrlInNewTab' => true
                ]
            )
            ->all();
    }

    public function getFormSchema(): array
    {
        // $userId = Auth::user()->id;
        return [
            Forms\Components\Hidden::make('user_id')
                ->default(fn () => Auth::user()->id)
                ->required(),
            Forms\Components\TextInput::make('title')
                ->label('Tiêu đề')
                ->required()
                ->maxLength(255),
            Forms\Components\ColorPicker::make('color')
                ->label('Màu sắc')
                ->required(),

            Forms\Components\Grid::make()
                ->schema([
                    Forms\Components\DateTimePicker::make('start_at')
                        ->required()
                        ->label('Bắt đầu'),

                    Forms\Components\DateTimePicker::make('end_at')
                        ->required()
                        ->label('Kết thúc'),
                ]),

            Forms\Components\RichEditor::make('description')
                ->label('Mô tả (nếu có)')
                ->maxLength(255),
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
            Actions\CreateAction::make()->label('Thêm sự kiện'),
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
                            'user_id' => Auth::user()->id,
                            'start_at' => $arguments['start'] ?? null,
                            'end_at' => $arguments['end'] ?? null,
                        ]);
                    }
                ),

            Actions\EditAction::make()
                ->mountUsing(
                    function (Event $record, Forms\Form $form, array $arguments) {
                        $form->fill([
                            'user_id' => $record->user_id,
                            'title' => $record->title,
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

