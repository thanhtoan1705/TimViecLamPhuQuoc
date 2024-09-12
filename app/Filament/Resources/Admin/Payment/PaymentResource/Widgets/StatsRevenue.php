<?php

namespace App\Filament\Resources\Admin\Payment\PaymentResource\Widgets;

use App\Models\Payment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsRevenue extends BaseWidget
{
    protected function getStats(): array
    {
        $year = now()->year;
        $today = now()->toDateString();

        // Tổng doanh thu theo năm
        $totalRevenueYear = Payment::query()
            ->selectRaw('SUM(amount) as total_revenue')
            ->whereYear('payment_date', $year)
            ->value('total_revenue');

        // Tổng doanh thu theo ngày
        $totalRevenueToday = Payment::query()
            ->selectRaw('SUM(amount) as total_revenue')
            ->whereDate('payment_date', $today)
            ->value('total_revenue');

        return [
            Stat::make('Tổng doanh thu', number_format($totalRevenueYear, 0, ',', ',') . ' vnđ')
//                ->description('Tăng 20%')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('primary')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('Tổng doanh thu hôm nay', number_format($totalRevenueToday, 0, ',', ',') . ' vnđ')
//                ->description('Tăng 20%')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([2, 5, 7, 3, 8, 6, 4]),
        ];
    }
}
