<?php

namespace App\Providers\Client\SEO;
use Illuminate\Support\Facades\View;
use App\Models\SiteSetting;
use Illuminate\Support\ServiceProvider;

class SEOServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // Chia sẻ dữ liệu $settings cho tất cả các view
        View::composer('*', function ($view) {
            $settings = SiteSetting::first();
            $view->with('settings', $settings);
        });
    }
}
