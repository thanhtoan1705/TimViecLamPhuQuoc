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
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\InterviewInvitation;

class InterviewResource extends Resource
{
    protected static ?string $model = Interview::class;

    protected static ?string $navigationLabel = 'Lịch phỏng vấn';

    protected static ?string $modelLabel = 'Lịch phỏng vấn';

    protected static ?string $navigationGroup = 'Sự kiện';

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?int $navigationSort = 8;

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
        return $form->schema([
            Forms\Components\Hidden::make('employer_id')
                ->default(fn () => auth()->user()->employer->id),

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
                    ]),

                    Grid::make(1)->schema([
                        Forms\Components\Select::make('job_post_candidates')
                            ->label('Ứng viên')
                            ->multiple()
                            ->relationship('candidates', 'id')
                            ->getOptionLabelFromRecordUsing(fn ($record) =>
                                $record->user->name . ' (' . $record->user->email . ' - ' . $record->user->phone . ')')
                            ->preload()
                            ->searchable(),

                        Forms\Components\RichEditor::make('description')
                            ->label('Mô tả')
                            ->columnSpan('full'),
                    ]),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('employer_id', auth()->user()->employer->id);
            })
            ->columns([
                TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('job_post.title')
                    ->label('Bài đăng việc làm')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('interview_type')
                    ->label('Hình thức')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'online' => 'success',
                        'offline' => 'warning',
                    }),
                TextColumn::make('start_time')
                    ->label('Thời gian bắt đầu')
                    ->dateTime('H:i:s d/m/Y'),

                TextColumn::make('candidates.user.name')
                    ->label('Ứng viên')
                    ->badge()
                    ->color('primary')
                    ->formatStateUsing(fn ($state) => $state) // Bỏ format
                    ->listWithLineBreaks(),

                Tables\Columns\ViewColumn::make('zoom_actions')
                    ->label('Zoom')
                    ->view('filament.resources.employer.interview.zoom-actions'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('copyZoomLink')
                        ->label('Copy Link')
                        ->icon('heroicon-o-clipboard')
                        ->visible(fn (Interview $record): bool =>
                            $record->interview_type === 'online' && $record->zoom_join_url
                        )
                        ->action(function (Interview $record) {
                            return response()->json([
                                'link' => $record->zoom_join_url
                            ]);
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Copy Zoom Link')
                        ->modalDescription(fn (Interview $record) => "Link: {$record->zoom_join_url}")
                        ->modalSubmitActionLabel('Copy')
                        ->successNotification(
                            Notification::make()
                                ->success()
                                ->title('Thành công')
                                ->body('Đã sao chép link vào clipboard')
                        ),

                    Tables\Actions\Action::make('joinZoom')
                        ->label('Join Zoom')
                        ->icon('heroicon-o-video-camera')
                        ->visible(fn (Interview $record): bool =>
                            $record->interview_type === 'online' && $record->zoom_join_url
                        )
                        ->url(fn (Interview $record): string => $record->zoom_join_url)
                        ->openUrlInNewTab(),

                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\Action::make('sendInvitation')
                        ->label('Gửi thư mời')
                        ->icon('heroicon-o-envelope')
                        ->form([
                            Forms\Components\Select::make('candidates')
                                ->label('Chọn ứng viên')
                                ->multiple()
                                ->options(function (Interview $record) {
                                    return $record->candidates->mapWithKeys(function ($candidate) {
                                        $userName = $candidate->user->name;
                                        $userEmail = $candidate->user->email;
                                        return [$candidate->id => "{$userName} ({$userEmail})"];
                                    });
                                })
                                ->required(),

                            Forms\Components\TextInput::make('subject')
                                ->label('Tiêu đề email')
                                ->default('Thư mời phỏng vấn')
                                ->required(),

                            Forms\Components\RichEditor::make('additional_content')
                                ->label('Nội dung bổ sung')
                                ->toolbarButtons([
                                    'bold',
                                    'italic',
                                    'underline',
                                    'bulletList',
                                    'orderedList',
                                ])
                                ->default(function (Interview $record) {
                                    return "<p>Kính gửi ứng viên,</p>" .
                                        "<p>Chúng tôi xin trân trọng mời bạn tham dự buổi phỏng vấn cho vị trí " .
                                        $record->job_post->title . ".</p>" .
                                        "<p><strong>Thông tin chi tiết:</strong></p>" .
                                        "<ul>" .
                                        "<li>Thời gian: " . $record->start_time->format('H:i d/m/Y') . "</li>" .
                                        "<li>Thời lượng: " . $record->duration . " phút</li>" .
                                        "<li>" . ($record->interview_type === 'online'
                                            ? "Hình thức: Phỏng vấn online qua Zoom<br>Link: <a href=\"" . htmlspecialchars($record->zoom_join_url, ENT_QUOTES, 'UTF-8') . "\" target=\"_blank\">" . htmlspecialchars($record->zoom_join_url, ENT_QUOTES, 'UTF-8') . "</a>"
                                            : "Hình thức: Phỏng vấn trực tiếp<br>Địa điểm: " . $record->location) . "</li>" .
                                        "</ul>" .
                                        "<p>Vui lòng xác nhận tham dự qua email này.</p>" .
                                        "<p>Trân trọng,</p>";
                                })
                                ->extraInputAttributes(['contentEditable' => 'false'])
                                ->toolbarButtons([])
                                ->columnSpanFull(),
                        ])
                        ->action(function (Interview $record, array $data) {
                            foreach ($data['candidates'] as $candidateId) {
                                $candidate = Candidate::find($candidateId);
                                Mail::to($candidate->user->email)
                                    ->send(new InterviewInvitation(
                                        $record,
                                        $data['subject'],
                                        $data['additional_content']
                                    ));
                            }

                            Notification::make()
                                ->success()
                                ->title('Thành công')
                                ->body('Đã gửi thư mời phỏng vấn')
                                ->send();
                        })
                        ->visible(fn (Interview $record): bool => $record->candidates->count() > 0),
                ]),
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
