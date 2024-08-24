<?php

namespace App\Repositories\JobCategory;

use App\Models\Job_category;
use Illuminate\Support\Facades\DB;

class JobCategoryRepository implements JobCategoryInterface
{
    protected $jobCategoryRepository;

    public function __construct(Job_category $jobCategoryRepository)
    {
        $this->jobCategoryRepository = $jobCategoryRepository;
    }

    public function hotJobCategories()
    {
        return $this->jobCategoryRepository
            ->with(['jobPosts', 'jobPosts.employer'])
            ->select(
                'job_categories.id',
                'job_categories.image as category_image',
                'job_categories.name as category_name'
            )
            ->withCount('jobPosts as total_job_posts')
            ->withCount(['jobPosts as total_employers' => function ($query) {
                $query->select(DB::raw('COUNT(DISTINCT employer_id)'));
            }])
            ->groupBy('job_categories.id', 'job_categories.name')
            ->orderBy('total_employers', 'desc')
            ->limit(6)
            ->get()
            ->map(function ($jobCategory) {
                return [
                    'category_image' => $jobCategory->category_image,
                    'category_name' => $jobCategory->category_name,
                    'total_job_posts' => $jobCategory->total_job_posts,
                    'total_employers' => $jobCategory->total_employers,
                ];
            });
    }
}
