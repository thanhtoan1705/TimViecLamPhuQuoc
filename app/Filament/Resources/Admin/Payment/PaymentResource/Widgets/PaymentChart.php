<?php

namespace App\Filament\Resources\Admin\Payment\PaymentResource\Widgets;

use App\Models\Payment;
use Filament\Widgets\ChartWidget;

class PaymentChart extends ChartWidget
{
    protected static ?string $heading = 'Thống kê doanh thu';
    protected static ?string $maxHeight = '300px';
    protected int|string|array $columnSpan = 2;

    protected function getData(): array
    {
        $year = now()->year;

        $revenueData = Payment::query()
            ->selectRaw('MONTH(payment_date) as month, SUM(amount) as total_revenue')
            ->whereYear('payment_date', $year)
            ->groupByRaw('MONTH(payment_date)')
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
                ],
            ],
            'labels' => [
                'Th 1', 'Th 2', 'Th 3', 'Th 4', 'Th 5',
                'Th 6', 'Th 7', 'Th 8', 'Th 9', 'Th 10',
                'Th 11', 'Th 12'
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
