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


/**
 * Trả về giá trị nếu không null, nếu không thì trả về giá trị mặc định.
 *
 * @param mixed $value Giá trị cần kiểm tra.
 * @param mixed $default Giá trị mặc định trả về nếu $value là null.
 * @return mixed Giá trị của $value hoặc giá trị mặc định.
 */
function get_or_default($value, $default = 'Chưa cập nhật'): mixed
{
    return !empty($value) ? $value : $default;
}

function get_nested_alue($object, $path, $default = 'Chưa cập nhật')
{
    $keys = explode('.', $path);

    foreach ($keys as $key) {
        if (is_object($object) && isset($object->{$key})) {
            $object = $object->{$key};
        } else {
            return $default;
        }
    }

    return $object;
}
