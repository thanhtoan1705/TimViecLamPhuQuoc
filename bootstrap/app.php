<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        using: function (){
            $adminRoutes = [

            ];

            $clientRoutes = [
                'client.php',
                'user.php',
                'employer.php',
                'job.php',
                'candidate.php',
                'post.php',
                'auth.php',
                'pricing.php',
                'chat.php',
                'cv.php',
            ];

            $employerRoutes = [
                'candidate.php',
                'history.php',
                'order.php',
                'voucher.php',
                'dashboard.php',
                'job.php',
                'service.php',
                'user.php',
                'interview.php',
            ];


            foreach ($adminRoutes as $route){
                Route::middleware('web')
                     ->prefix('admin')
                     ->name('admin.')
                     ->group(base_path("routes/admin/{$route}"));
            }

            foreach ($clientRoutes as $route){
                Route::middleware('web')
                     ->prefix('')
                    ->name('client.')
                     ->group(base_path("routes/client/{$route}"));
            }

            foreach ($employerRoutes as $route){
                Route::middleware('web')
                    ->prefix('nha-tuyen-dung')
                    ->name('employer.')
                     ->group(base_path("routes/employer/{$route}"));
            }
        },
    )
    ->withMiddleware(function (Middleware $middleware){
        //
    })
    ->withExceptions(function (Exceptions $exceptions){
        //
    })->create();

