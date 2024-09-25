<?php

namespace App\Repositories\Promotional;


use App\Models\PaymentMethod;
use App\Models\Promotion;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\TransactionLog;
use Carbon\Carbon;

class PromotionalRepository implements PromotionalInterface
{
    protected Promotion $promotion;

    public function __construct(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }

    public function getPaymentMethodId($paymentMethod)
    {
        return PaymentMethod::where('name', $paymentMethod)->value('id');
    }

    public function getAvailablePromotions($employerId)
    {
        $now = now();

        $usedPromotions = Payment::where('employer_id', $employerId)
            ->whereNotNull('promotion_id')
            ->pluck('promotion_id');

        $availablePromotions = Promotion::whereNotIn('id', $usedPromotions)
            ->where('status', 1)
            ->where('start_time', '<', $now)
            ->where('end_time', '>', $now)
            ->get();

        return $availablePromotions;
    }

    public function validatePromo($promoCode, $employerId)
    {
        $now = now();

        $promotion = Promotion::whereRaw('LOWER(code) = ?', [strtolower($promoCode)])
            ->where('status', 1) // Mã giảm giá đang hoạt động
            ->where('start_time', '<=', $now) // Mã giảm giá đã bắt đầu
            ->where('end_time', '>=', $now)   // Mã giảm giá chưa hết hạn
            ->first();

        if (!$promotion) {
            return null;
        }

        // Kiểm tra xem employer đã sử dụng mã này chưa
        $usedPromotion = Payment::where('employer_id', $employerId)
            ->where('promotion_id', $promotion->id)
            ->exists();

        // Nếu mã đã được employer sử dụng, trả về null
        if ($usedPromotion) {
            return null;
        }

        // Mã giảm giá hợp lệ, trả về thông tin của mã
        return $promotion;
    }
}

