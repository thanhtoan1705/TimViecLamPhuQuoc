<?php

namespace App\Filament\Employer\Widgets\Employer;

use App\Models\JobPostCandidate;
use Filament\Widgets\ChartWidget;

class ViewedApplicationsChart extends ChartWidget
{
    protected static ?string $heading = 'Ứng viên ứng tuyển';
    protected static ?int $sort = 2;
    protected static ?string $maxHeight = '255px';

    protected function getData(): array
    {
        $employerId = auth()->user()->employer->id;

        // Lấy số lượng ứng viên đã xem và chưa xem
        $viewedCount = JobPostCandidate::whereHas('jobPost', function ($query) use ($employerId) {
            $query->where('employer_id', $employerId);
        })
            ->where('viewed', true)
            ->count();

        $unviewedCount = JobPostCandidate::whereHas('jobPost', function ($query) use ($employerId) {
            $query->where('employer_id', $employerId);
        })
            ->where('viewed', false)
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Ứng viên',
                    'data' => [$viewedCount, $unviewedCount],
                    'backgroundColor' => ['#4CAF50', '#F44336'],
                ],
            ],
            'labels' => [
                'Đã xem', 'Chưa xem',
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getHeight(): string
    {
        return '100px'; // Điều chỉnh chiều cao ở đây, ví dụ là 250px
    }
}
