<?php

namespace App\Filament\Resources\Employer\Promotional\PromotionalResource\Pages;

use App\Filament\Resources\Employer\Promotional\PromotionalResource;
use App\Models\Promotion;
use Filament\Resources\Pages\Page;
use Carbon\Carbon;
use App\Models\Payment;

class CustomView extends Page
{
    protected static string $resource = PromotionalResource::class;
    protected static ?string $navigationLabel = 'Mã giảm giá';
    protected static string $view = 'filament.resources.employer.promotional.pages.custom-view';

    public $packages;

    public function mount()
    {
        $employerId = auth()->id(); // Lấy ID của employer hiện tại
        $now = now(); // Thời gian hiện tại

        $this->packages = [
            // Lấy tất cả mã giảm giá đã được employer này sử dụng
            'status_0' => Promotion::whereHas('payments', function ($query) use ($employerId) {
                $query->where('employer_id', $employerId)
                    ->whereNotNull('promotion_id'); // Chỉ lấy các payment có mã giảm giá
            })->get(),

            // Các mã giảm giá có hiệu lực (status = 1 và chưa hết hạn)
            'status_1' => Promotion::where('status', 1)
                ->where('end_time', '>', $now) // Thời gian còn hiệu lực
                ->get(),

            // Mã giảm giá đã hết hạn hoặc số lượt sử dụng = 0 và status = 0
            'status_2' => Promotion::where(function ($query) use ($now) {
                $query->where('status', 0)
                    ->where('number_use', 0) // Số lượt sử dụng = 0
                    ->orWhere(function ($subQuery) use ($now) {
                        $subQuery->where('status', 1)
                            ->where('end_time', '<', $now); // Đã hết hạn
                    });
            })->get(),
        ];
    }
}
