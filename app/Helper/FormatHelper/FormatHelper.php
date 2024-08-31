<?php

if (!function_exists('formatSalary')) {
    function formatSalary($amount)
    {
        $amount = (int)$amount;
        $length = strlen((string)$amount);

        if ($length == 9) {
            return ($amount / 1000000) . ' triệu';
        } elseif ($length == 7 || $length == 8) {
            return ($amount / 1000000) . ' triệu';
        } elseif ($length <= 6) {
            return 'Dưới 1 triệu';
        }

        return $amount;
    }
}
