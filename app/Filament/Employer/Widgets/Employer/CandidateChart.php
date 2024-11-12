<?php

namespace App\Filament\Employer\Widgets\Employer;

use App\Models\JobPostCandidate;
use Filament\Widgets\ChartWidget;

class CandidateChart extends ChartWidget
{
    protected static ?string $heading = 'Thống kê ứng viên ứng tuyển theo thời gian';

    protected static ?int $sort = 2;

    public ?string $filter = 'year';

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Hôm nay',
            'week' => 'Tuần trước',
            'month' => 'Tháng trước',
            'year' => 'Năm nay',
        ];
    }


    protected function getData(): array
    {
        $employerId = auth()->user()->employer->id;
        $activeFilter = $this->filter;

        // Điều kiện lọc thời gian dựa trên bộ lọc đã chọn
        $query = JobPostCandidate::whereHas('jobPost', function ($query) use ($employerId) {
            $query->where('employer_id', $employerId);
        });

        switch ($activeFilter) {
            case 'today':
                $query->whereDate('created_at', now()->toDateString());
                break;

            case 'week':
                $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                break;

            case 'month':
                $query->whereMonth('created_at', now()->subMonthNoOverflow()->month)
                    ->whereYear('created_at', now()->year);
                break;

            case 'year':
                $query->whereYear('created_at', now()->year);
                break;
        }

        // Lấy số lượng ứng viên theo từng tháng
        $data = $query->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Khởi tạo mảng 12 tháng, nếu tháng nào không có ứng viên thì set về 0
        $monthlyData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyData[] = $data[$i] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Số lượng ứng viên',
                    'data' => $monthlyData,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                ],
            ],
            'labels' => [
                'Th 1', 'Th 2', 'Th 3', 'Th 4', 'Th 5', 'Th 6',
                'Th 7', 'Th 8', 'Th 9', 'Th 10', 'Th 11', 'Th 12'
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
