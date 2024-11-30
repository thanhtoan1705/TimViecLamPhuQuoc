<?php

namespace App\Filament\Resources\Admin\Payment\PaymentResource\Widgets;

use App\Models\Payment;
use Filament\Widgets\ChartWidget;

class PaymentChart extends ChartWidget
{
    protected static ?string $heading = 'Thống kê doanh thu theo thời gian';
    protected static ?string $maxHeight = '300px';
    protected int|string|array $columnSpan = 2;

    public ?string $filter = 'year';

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Hôm nay',
            'week' => 'Tuần trước',
            'month' => 'Tháng trước',
            'year' => 'Năm nay',
            'multi-year' => 'Theo các năm',
        ];
    }

    protected function getData(): array
    {
        $activeFilter = $this->filter;

        $query = Payment::query();

        switch ($activeFilter) {
            case 'today':
                $query->whereDate('payment_date', now()->toDateString());
                break;

            case 'week':
                $query->whereBetween('payment_date', [now()->startOfWeek(), now()->endOfWeek()]);
                break;

            case 'month':
                $query->whereMonth('payment_date', now()->subMonthNoOverflow()->month)
                    ->whereYear('payment_date', now()->year);
                break;

            case 'year':
                $query->whereYear('payment_date', now()->year);
                break;

            case 'multi-year':
                $query->selectRaw('YEAR(payment_date) as year, SUM(amount) as total_revenue')
                    ->groupBy('year')
                    ->orderBy('year');
                break;
        }

        if ($activeFilter === 'multi-year') {
            $revenueData = $query->pluck('total_revenue', 'year')->toArray();

            $years = array_keys($revenueData);
            $revenues = array_values($revenueData);

            return [
                'datasets' => [
                    [
                        'label' => 'Doanh thu theo năm',
                        'data' => $revenues,
                        'backgroundColor' => 'rgba(153, 102, 255, 0.2)',
                        'borderColor' => 'rgba(153, 102, 255, 1)',
                        'borderWidth' => 1,
                    ],
                ],
                'labels' => $years,
            ];
        } else {
            $revenueData = $query->selectRaw('MONTH(payment_date) as month, SUM(amount) as total_revenue')
                ->groupBy('month')
                ->orderBy('month')
                ->pluck('total_revenue', 'month')
                ->toArray();

            $monthlyRevenue = array_fill(1, 12, 0);
            foreach ($revenueData as $month => $revenue) {
                $monthlyRevenue[$month] = $revenue;
            }

            return [
                'datasets' => [
                    [
                        'label' => 'Doanh thu',
                        'data' => array_values($monthlyRevenue),
                        'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                        'borderColor' => 'rgba(75, 192, 192, 1)',
                        'borderWidth' => 1,
                    ],
                ],
                'labels' => [
                    'Th 1', 'Th 2', 'Th 3', 'Th 4', 'Th 5', 'Th 6',
                    'Th 7', 'Th 8', 'Th 9', 'Th 10', 'Th 11', 'Th 12',
                ],
            ];
        }
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
