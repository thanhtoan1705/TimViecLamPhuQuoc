<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('getStorageImageUrl')) {
    function getStorageImageUrl ($path, $default)
    {
        // Kiểm tra nếu $path là URL
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        // Kiểm tra ảnh trong thư mục storage
        if ($path && Storage::disk('public')->exists($path)) {
            return asset('storage/' . $path);
        }

        // Trả về ảnh mặc định
        return asset($default);
    }
}
