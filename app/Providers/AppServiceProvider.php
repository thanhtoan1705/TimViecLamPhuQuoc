<?php

namespace App\Providers;

use App\Repositories\Blog\BlogInterface;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\Employer\EmployerInterface;
use App\Repositories\Employer\EmployerRepository;
use App\Repositories\Job\JobInterface;
use App\Repositories\Job\JobRepository;
use App\Repositories\JobCategory\JobCategoryInterface;
use App\Repositories\JobCategory\JobCategoryRepository;
use App\Repositories\JobPost\JobPostInterface;
use App\Repositories\JobPost\JobPostRepository;
use App\Repositories\Post\PostInterface;
use App\Repositories\Post\PostRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmployerInterface::class, EmployerRepository::class);
        $this->app->bind(JobInterface::class, JobRepository::class);
        $this->app->bind(BlogInterface::class, BlogRepository::class);
        $this->app->bind(JobPostInterface::class, JobPostRepository::class);
        $this->app->bind(JobCategoryInterface::class, JobCategoryRepository::class);
        $this->app->bind(PostInterface::class, PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
