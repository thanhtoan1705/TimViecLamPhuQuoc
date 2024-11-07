<?php

use Illuminate\Support\Str;

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

// Giới hạn chữ mô tả bài viết, sản phẩm
if (!function_exists('limit_text')) {
    function limit_text($text, $limit = 130, $end = ' ...'): string
    {
        // Loại bỏ thẻ HTML và thay thế &nbsp; bằng khoảng trắng
        $text = str_replace('&nbsp;', ' ', strip_tags($text));
        $text = str_replace('&amp;', '&', strip_tags($text));
        return Str::limit($text, $limit, $end);
    }
}

if (!function_exists('check_empty')) {
    function check_empty($content, $default): string
    {
        return !empty($content) && !is_null($content) ? $content : $default;
    }
}
