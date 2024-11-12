<?php

namespace App\Filament\Employer\Widgets\Employer;

use App\Models\Candidate;
use App\Models\Employer;
use App\Models\JobPost;
use App\Models\JobPostCandidate;
use App\Models\Payment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';

    protected static bool $isLazy = true;

    protected function getStats(): array
    {
        $employer_id = auth()->user()->employer->id;


        return [

            Stat::make(
                'Ứng viên ứng tuyển',
                JobPostCandidate::whereHas('jobPost', function ($query) use ($employer_id) {
                    $query->where('employer_id', $employer_id);
                })->count()
            )
                ->description('Số lượng ứng viên đã nộp đơn')
                ->descriptionIcon('heroicon-o-user-group', 'before')
                ->color('warning'),

            Stat::make('Tin tuyển dụng', JobPost::where('employer_id', $employer_id)->count())
                ->description('Tin tuyển dụng đã đăng')
                ->descriptionIcon('heroicon-o-clipboard-document-list', 'before')
                ->color('success'),

            Stat::make(
                'Tin tuyển dụng hết hạn ứng tuyển',
                JobPost::where('employer_id', $employer_id)
                    ->where('end_date', '<', now())  // Giả sử bạn có cột `expiry_date`
                    ->count()
            )
                ->description('Số lượng tin tuyển dụng đã hết hạn')
                ->descriptionIcon('heroicon-o-arrow-trending-down', 'before')
                ->color('danger'),


        ];
    }

}
