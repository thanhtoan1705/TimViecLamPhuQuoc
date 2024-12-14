<?php

namespace App\Filament\Widgets\Admin;

use App\Models\Candidate;
use App\Models\Employer;
use App\Models\Payment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;


class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '15s';

    protected static bool $isLazy = true;

//    protected function getStats(): array
//    {
//        $year = now()->year;
//        $today = now()->toDateString();
//
//        // Tổng doanh thu theo năm
//        $totalRevenueYear = Payment::query()
//            ->selectRaw('SUM(amount) as total_revenue')
//            ->whereYear('payment_date', $year)
//            ->value('total_revenue');
//
//        // Tổng doanh thu theo ngày
//        $totalRevenueToday = Payment::query()
//            ->selectRaw('SUM(amount) as total_revenue')
//            ->whereDate('payment_date', $today)
//            ->value('total_revenue');
//
//        return [
//            Stat::make('Nhà tuyển dụng', Employer::count())
//                ->description('Số lượng Nhà tuyển dụng')
//                ->descriptionIcon('heroicon-o-user-group', 'before')
//                ->color('success'),
//
//
//            Stat::make('Ứng viên', Candidate::count())
//                ->description('Số lượng ứng viên')
//                ->descriptionIcon('heroicon-o-user-group')
//                ->color('warning'),
//
//            Stat::make('Tổng doanh thu', number_format($totalRevenueYear, 0, ',', ',') . ' vnđ')
//                ->description('Tăng 20%')
//                ->descriptionIcon('heroicon-m-arrow-trending-up')
//                ->color('primary'),
//        ];
//    }

    protected function getStats(): array
    {
        $month = now()->month;
        $year = now()->year;
        $today = now()->toDateString();

        // Tổng doanh thu theo tháng này
        $totalRevenueMonth = Payment::query()
            ->selectRaw('SUM(amount) as total_revenue')
            ->whereYear('payment_date', $year)
            ->whereMonth('payment_date', $month)
            ->value('total_revenue');

        // Tổng doanh thu theo tháng trước
        $lastMonth = $month - 1;
        if ($lastMonth == 0) {
            $lastMonth = 12;
            $year -= 1; // Nếu là tháng 1, phải lấy năm trước
        }

        $totalRevenueLastMonth = Payment::query()
            ->selectRaw('SUM(amount) as total_revenue')
            ->whereYear('payment_date', $year)
            ->whereMonth('payment_date', $lastMonth)
            ->value('total_revenue');

        // Tính phần trăm tăng trưởng so với tháng trước
        $percentageIncrease = 0;
        if ($totalRevenueLastMonth > 0) {
            $percentageIncrease = (($totalRevenueMonth - $totalRevenueLastMonth) / $totalRevenueLastMonth) * 100;
        }

        // Tổng doanh thu theo ngày
        $totalRevenueToday = Payment::query()
            ->selectRaw('SUM(amount) as total_revenue')
            ->whereDate('payment_date', $today)
            ->value('total_revenue');

        return [
            Stat::make('Nhà tuyển dụng', Employer::count())
                ->description('Số lượng Nhà tuyển dụng')
                ->descriptionIcon('heroicon-o-user-group', 'before')
                ->color('success'),

            Stat::make('Ứng viên', Candidate::count())
                ->description('Số lượng ứng viên')
                ->descriptionIcon('heroicon-o-user-group', 'before')
                ->color('warning'),

            Stat::make('Tổng doanh thu', number_format($totalRevenueMonth, 0, ',', ',') . ' vnđ')
                ->description(number_format($percentageIncrease, 2) . "% so với tháng trước")
//                ->descriptionIcon('heroicon-m-arrow-trending-up', 'before')
                ->color('primary'),
        ];
    }
}
