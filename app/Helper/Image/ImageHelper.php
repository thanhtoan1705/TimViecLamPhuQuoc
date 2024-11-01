<?php

namespace App\Helper\Image;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    public static function getImageUrl($path, $default)
    {
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        if ($path && Storage::disk('public')->exists($path)) {
            return asset('storage/' . $path);
        }

        return asset($default);
    }
}
