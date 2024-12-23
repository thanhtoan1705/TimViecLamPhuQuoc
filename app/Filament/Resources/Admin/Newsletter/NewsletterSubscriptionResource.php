<?php

namespace App\Filament\Resources\Admin\Newsletter;

use App\Filament\Pages\Newslette\SendNewslette;
use App\Filament\Resources\Admin\Newsletter\NewsletterSubscriptionResource\Pages;
use App\Filament\Resources\Admin\Newsletter\NewsletterSubscriptionResource\Pages\Tsting;
use App\Filament\Resources\Admin\Newsletter\NewsletterSubscriptionResource\RelationManagers;
use App\Jobs\Client\SendNewsletterEmail;
use App\Models\NewsletterSubscription;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;

class NewsletterSubscriptionResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = NewsletterSubscription::class;

    protected static ?string $slug = 'newsletter-subscriptions';

    protected static ?string $navigationLabel = 'Đăng ký nhận tin';

    protected static ?string $modelLabel = 'Đăng ký nhận tin';

    protected static ?string $navigationGroup = 'Quản lý nhận tin';

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

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

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
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
                        Grid::make(1)->schema([
                            Section::make('Thông tin người dùng')
                                ->schema([
                                    TextInput::make('email')
                                        ->label('Email')
                                        ->email()
                                        ->required()
                                        ->unique(ignoreRecord: true)
                                        ->placeholder('Nhập email'),

                                    Toggle::make('status')
                                        ->label('Đã xác thực')
                                        ->inline(false)
                                        ->default(false),
                                ])
                        ])->columnSpan(2),

                        Grid::make(1)->schema([
                            Section::make()
                                ->schema([
                                    Placeholder::make('created_at')
                                        ->label('Ngày đăng ký')
                                        ->content(fn ($record) => $record ? $record->created_at->format('d/m/Y H:i:s') : '-'),
                                ])
                        ])->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')->label('Email')->sortable()->searchable(),
                Tables\Columns\BooleanColumn::make('status')->label('Đã xác thực'),
                Tables\Columns\TextColumn::make('created_at')->label('Ngày đăng ký')->date(),
            ])
            ->filters([
                Tables\Filters\Filter::make('verified')
                    ->label('Đã xác thực')
                    ->query(fn($query) => $query->where('status', true)),

                Tables\Filters\Filter::make('unverified')
                    ->label('Chưa xác thực')
                    ->query(fn($query) => $query->where('status', false)),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    BulkAction::make('Gửi mail')
                        ->icon('heroicon-o-envelope')
                        ->color('primary')
                        ->form([
                            Textarea::make('subject')
                                ->label('Tiêu đề email')
                                ->required()
                                ->placeholder('Nhập tiêu đề email...'),

                            RichEditor::make('content')
                                ->label('Nội dung email')
                                ->required()
                                ->placeholder('Nhập nội dung email...'),
                        ])
                        ->action(function (Collection $records, array $data) {
                            $subject = $data['subject'];
                            $content = $data['content'];

                            $records->where('status', 1)->each(function ($record) use ($subject, $content) {
                                dispatch(new SendNewsletterEmail($record->email, $subject, $content));
                            });
                            Notification::make()
                                ->title('Đã gửi mail thành công!')
                                ->success()
                                ->send();
                        })
                        ->deselectRecordsAfterCompletion(),
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
            'index' => Pages\ListNewsletterSubscriptions::route('/'),
            'create' => Pages\CreateNewsletterSubscription::route('/create'),
            'edit' => Pages\EditNewsletterSubscription::route('/{record}/edit')
        ];
    }
}
