<?php

namespace App\Providers;

use App\Repositories\Employer\EmployerInterface;
use App\Repositories\Employer\EmployerRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmployerInterface::class, EmployerRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
