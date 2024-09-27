<?php

namespace App\Filament\Resources\Admin\Interview;

use App\Filament\Resources\Interview\InterviewResource\Pages;
use App\Filament\Resources\Interview\InterviewResource\RelationManagers;
use App\Models\Interview;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class InterviewResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Interview::class;

    protected static ?string $navigationLabel = 'Phỏng vấn';

    protected static ?string $modelLabel = 'Phỏng vấn';
    protected static ?string $navigationGroup = 'Phỏng vấn';

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-oval-left';

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


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)  // Thay đổi số lượng cột chính
                ->schema([
                    Grid::make(1)->schema([
                        Section::make('Thông tin ứng viên')
                            ->schema([
                                Forms\Components\Select::make('candidate_id')
                                    ->required()
                                    ->relationship('candidate.user', 'name')
                                    ->label('Tên ứng viên'),
                                Forms\Components\Select::make('employer_id')
                                    ->required()
                                    ->relationship('employer.user', 'name')
                                    ->label('Tên nhà tuyển dụng'),
                                Forms\Components\Select::make('job_id')
                                    ->required()
                                    ->relationship('job_post', 'title')
                                    ->label('Tên bài đăng'),
                                TextInput::make('name')->required()->label('Tên buổi phỏng vấn'),
                                Forms\Components\DateTimePicker::make('time')
                                    ->required()
                                    ->label('Thời gian'),
                                TextInput::make('phone')->required()->label('Điện thoại')->tel(),
                                TextInput::make('email')->required()->label('Email')->email(),
                            ])
                    ])->columnSpan(1),  // Chiếm 1 cột

                    Grid::make(1)->schema([
                        Section::make('Chi tiết phỏng vấn')
                            ->schema([
                                TextInput::make('viewer')->required()->label('Số người phỏng vấn')->numeric(),
                                TextInput::make('location')->required()->label('Địa điểm'),
                                TextInput::make('status')->required()->label('Trạng thái')->numeric(),
                                Forms\Components\MarkdownEditor::make('feedback')->label('Phản hồi'),
                                Forms\Components\DateTimePicker::make('date')->required()->label('Ngày phỏng vấn'),
                                Forms\Components\MarkdownEditor::make('note')->label('Ghi chú'),
                            ])
                    ])->columnSpan(1),  // Chiếm 1 cột
                ]),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('row_number')
                    ->label('STT')
                    ->getStateUsing(fn($rowLoop) => $rowLoop->index + 1),
                Tables\Columns\TextColumn::make('employer.user.name')->label('Nhà tuyển dụng')->searchable(),
                Tables\Columns\TextColumn::make('candidate.user.name')->label('Ứng viên')->searchable(),
                Tables\Columns\TextColumn::make('date')->dateTime()->label('Ngày phỏng vấn')->searchable(),
                Tables\Columns\TextColumn::make('location')->label('Địa điểm')->searchable(),
            ])
            ->filters([
                Filter::make('name')
                    ->label('Lọc theo tên')
                    ->query(fn(Builder $query, array $data) => $query->where('name', 'like', '%' . $data['value'] . '%'))
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
            'index' => \App\Filament\Resources\Admin\Interview\InterviewResource\Pages\ListInterviews::route('/'),
            'create' => \App\Filament\Resources\Admin\Interview\InterviewResource\Pages\CreateInterview::route('/create'),
            'edit' => \App\Filament\Resources\Admin\Interview\InterviewResource\Pages\EditInterview::route('/{record}/edit'),
        ];
    }
}
