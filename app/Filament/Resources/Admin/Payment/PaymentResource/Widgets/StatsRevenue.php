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
        $month = now()->month;
        $today = now()->toDateString();

        // Tổng doanh thu theo năm
        $totalRevenueYear = Payment::query()
            ->selectRaw('SUM(amount) as total_revenue')
            ->whereYear('payment_date', $year)
            ->value('total_revenue');

        // Doanh thu từng tháng trong năm
        $monthlyRevenue = Payment::query()
            ->selectRaw('MONTH(payment_date) as month, SUM(amount) as total_revenue')
            ->whereYear('payment_date', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_revenue', 'month')
            ->toArray();

        // Tổng doanh thu theo tháng
        $totalRevenueMonth = Payment::query()
            ->selectRaw('SUM(amount) as total_revenue')
            ->whereYear('payment_date', $year)
            ->whereMonth('payment_date', $month)
            ->value('total_revenue');

        // Doanh thu từng ngày trong tháng
        $dailyRevenue = Payment::query()
            ->selectRaw('DAY(payment_date) as day, SUM(amount) as total_revenue')
            ->whereYear('payment_date', $year)
            ->whereMonth('payment_date', $month)
            ->groupBy('day')
            ->orderBy('day')
            ->pluck('total_revenue', 'day')
            ->toArray();

        // Tổng doanh thu theo ngày
        $totalRevenueToday = Payment::query()
            ->selectRaw('SUM(amount) as total_revenue')
            ->whereDate('payment_date', $today)
            ->value('total_revenue');

        // Doanh thu từng giờ trong ngày
        $hourlyRevenue = Payment::query()
            ->selectRaw('HOUR(payment_date) as hour, SUM(amount) as total_revenue')
            ->whereDate('payment_date', $today)
            ->groupBy('hour')
            ->orderBy('hour')
            ->pluck('total_revenue', 'hour')
            ->toArray();

        return [
            Stat::make('Tổng doanh thu năm', number_format($totalRevenueYear, 0, ',', ',') . ' vnđ')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('primary')
                ->chart(array_values(array_replace(array_fill(1, 12, 0), $monthlyRevenue))),

            Stat::make('Tổng doanh thu tháng này', number_format($totalRevenueMonth, 0, ',', ',') . ' vnđ')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart(array_values(array_replace(array_fill(1, now()->daysInMonth, 0), $dailyRevenue))),

            Stat::make('Tổng doanh thu hôm nay', number_format($totalRevenueToday, 0, ',', ',') . ' vnđ')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info')
                ->chart(array_values(array_replace(array_fill(0, 24, 0), $hourlyRevenue))),
        ];
    }
}
