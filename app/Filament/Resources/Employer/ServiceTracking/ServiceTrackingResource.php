<?php

namespace App\Filament\Resources\Employer\ServiceTracking;

use App\Filament\Resources\Employer\ServiceTracking\ServiceTrackingResource\Pages;
use App\Filament\Resources\Employer\ServiceTracking\ServiceTrackingResource\RelationManagers;
use App\Models\UserJobPackage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ServiceTrackingResource extends Resource
{
    protected static ?string $model = UserJobPackage::class;

    protected static ?string $navigationLabel = 'Dịch vụ đã mua';

    protected static ?string $modelLabel = 'Dịch vụ đã mua';

    protected static ?string $navigationGroup = 'Dịch vụ';

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    public static function getNavigationBadge(): ?string
    {
        $userId = Auth::user()->id;

        return static::getModel()::where('employer_id', $userId)->count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'primary';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        $userId = Auth::user()->id;

        return $table
        ->defaultSort('created_at', 'desc')

        ->modifyQueryUsing(function (Builder $query) use ($userId) {
            $query->where('employer_id', $userId);
        })

        ->columns([
            TextColumn::make('jobPostPackage.title')
                ->label('Gói dịch vụ'),

            TextColumn::make('jobPostPackage.price')
                ->label('Giá')
                ->formatStateUsing(fn ($state) => number_format($state) . ' đ'),

            TextColumn::make('jobPostPackage.limit_job_post')
                ->label('Giới hạn bài đăng'),

            TextColumn::make('remaining_posts')
                ->label('Bài đăng còn lại'),

            TextColumn::make('created_at')->label('Ngày mua')
                ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)
                ->format('d/m/Y - h:i A'))
                ->sortable(),

            TextColumn::make('expires_at')->label('Ngày hết hạn')
                ->formatStateUsing(fn($state) => \Carbon\Carbon::parse($state)
                ->format('d/m/Y - h:i A'))
                ->sortable(),

            TextColumn::make('status')
                ->label('Trạng thái')
                ->getStateUsing(function ($record) {
                    $now = Carbon::now();
                    $expiresAt = Carbon::parse($record->expires_at);

                    if ($now->greaterThan($expiresAt)) {
                        return 'Hết hạn';
                    }

                    $diffInDays = $now->diffInDays($expiresAt, false);
                    $diffInHours = $now->diffInHours($expiresAt, false);

                    if ($diffInDays > 1) {
                        return "Còn " . ceil($diffInDays) . " ngày";
                    } elseif ($diffInDays === 1) {
                        return "Còn 1 ngày";
                    } elseif ($diffInHours > 1) {
                        return "Còn " . ceil($diffInHours) . " giờ";
                    } else {
                        return "Hết hạn sau 1 giờ";
                    }
                })
        ])
        ->filters([
            //
        ])
        ->actions([
            //
        ])
        ->bulkActions([
            // Tables\Actions\BulkActionGroup::make([
            //     Tables\Actions\DeleteBulkAction::make(),
            // ]),
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
            'index' => Pages\ListServiceTrackings::route('/'),
        ];
    }
}
