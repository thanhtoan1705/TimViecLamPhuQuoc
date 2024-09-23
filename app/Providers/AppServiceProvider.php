<?php

namespace App\Providers;

use App\Models\JobPostCandidate;
use App\Models\User;
use App\Observers\JobPostCandidateObserver;
use App\Observers\UserObserver;
use App\Repositories\Blog\BlogInterface;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\Candidate\CandidateInterface;
use App\Repositories\Candidate\CandidateRepository;
use App\Repositories\Employer\EmployerInterface;
use App\Repositories\Employer\EmployerRepository;
use App\Repositories\Filter\FilterInterface;
use App\Repositories\Filter\FilterRepository;
use App\Repositories\Job\JobInterface;
use App\Repositories\Job\JobRepository;
use App\Repositories\JobCategory\JobCategoryInterface;
use App\Repositories\JobCategory\JobCategoryRepository;
use App\Repositories\JobPost\JobPostInterface;
use App\Repositories\JobPost\JobPostRepository;
use App\Repositories\Location\LocationInterface;
use App\Repositories\Location\LocationRepository;
use App\Repositories\Post\PostInterface;
use App\Repositories\Post\PostRepository;
use App\Repositories\Promotional\PromotionalInterface;
use App\Repositories\Promotional\PromotionalRepository;
use App\Repositories\User\UserInterface;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(EmployerInterface::class, EmployerRepository::class);
        $this->app->bind(CandidateInterface::class, CandidateRepository::class);
        $this->app->bind(JobInterface::class, JobRepository::class);
        $this->app->bind(BlogInterface::class, BlogRepository::class);
        $this->app->bind(JobPostInterface::class, JobPostRepository::class);
        $this->app->bind(JobCategoryInterface::class, JobCategoryRepository::class);
        $this->app->bind(PostInterface::class, PostRepository::class);
        $this->app->bind(LocationInterface::class, LocationRepository::class);
        $this->app->bind(FilterInterface::class, FilterRepository::class);
        $this->app->bind(PromotionalInterface::class, PromotionalRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        User::observe(UserObserver::class);
        JobPostCandidate::observe(JobPostCandidateObserver::class);
    }
}
