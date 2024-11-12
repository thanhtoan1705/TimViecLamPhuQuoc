<?php

namespace App\Filament\Widgets\Admin;

use App\Models\Employer;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\View\View;

class EmployerChart extends ChartWidget
{
    protected static ?string $heading = 'Nhà tuyển dụng';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = $this->getEmployerPerMonth();

        return [
            'datasets' => [
                [
                    'label' => 'Nhà tuyển dụng',
                    'data' => $data['employerPerMonth'],
                ]
            ],
//            'labels' => $data['months']
            'labels' => [
                'Th 1', 'Th 2', 'Th 3', 'Th 4', 'Th 5',
                'Th 6', 'Th 7', 'Th 8', 'Th 9', 'Th 10',
                'Th 11', 'Th 12'
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }


    private function getEmployerPerMonth(): array
    {
        $now = Carbon::now();
        $employerPerMonth = [];

        // Sử dụng `map` để tạo nhãn tháng và đếm số nhà tuyển dụng trong mỗi tháng
        $months = collect(range(1, 12))->map(function ($month) use ($now, &$employerPerMonth) {
            $startOfMonth = Carbon::create($now->year, $month, 1);
            $endOfMonth = $startOfMonth->copy()->endOfMonth();

            // Đếm nhà tuyển dụng trong tháng hiện tại
            $count = Employer::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

            // Thêm vào mảng `$employerPerMonth`
            $employerPerMonth[] = $count;

            return $startOfMonth->format('M');
        })->toArray();

        return [
            'employerPerMonth' => $employerPerMonth,
            'months' => $months,
        ];
    }

}
