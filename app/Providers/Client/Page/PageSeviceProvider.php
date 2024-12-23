<?php

namespace App\Providers\Client\Page;

use App\Models\Page;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PageSeviceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $pages = Page::where('is_active', 1)->get();
            $view->with('pages', $pages);
        });
    }
}
