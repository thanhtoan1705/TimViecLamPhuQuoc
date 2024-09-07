<?php

namespace App\Helper\PromotionHelper;

use DateTime;

class PromotionHelper
{
    public static function getTimeRemaining($endTime)
    {
        $now = new DateTime();
        $endTime = new DateTime($endTime);

        // Tính khoảng thời gian còn lại
        $interval = $now->diff($endTime);

        // Lấy số ngày, giờ, và phút
        $days = $interval->days;
        $hours = $interval->h;
        $minutes = $interval->i;

        return "{$days} ngày {$hours} giờ {$minutes} phút";
    }
}
