<?php

namespace App\Repositories\Promotional;


use App\Models\Promotion;
use App\Models\Payment;

class PromotionalRepository implements PromotionalInterface
{
    protected Promotion $promotion;

    public function __construct(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }

    public function getAvailablePromotions($employerId)
    {
        $now = now();

        // Lấy danh sách mã giảm giá mà Employer đã sử dụng
        $usedPromotions = Payment::where('employer_id', $employerId)
            ->whereNotNull('promotion_id')
            ->pluck('promotion_id');

        // Lấy danh sách mã giảm giá có hiệu lực (active) và chưa sử dụng
        $availablePromotions = Promotion::whereNotIn('id', $usedPromotions)
            ->where('status', 1) // Mã giảm giá đang được kích hoạt (active)
            ->where('end_time', '>', $now) // Mã giảm giá chưa hết hạn
            ->get();

        return $availablePromotions;
    }
}

