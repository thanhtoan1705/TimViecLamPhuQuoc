<?php

namespace App\Repositories\JobCategory;

use App\Models\Job_category;
use Illuminate\Support\Facades\DB;

class JobCategoryRepository implements JobCategoryInterface
{
    protected $jobCategory;

    public function __construct(Job_category $jobCategory)
    {
        $this->jobCategory = $jobCategory;
    }

    public function hotJobCategories()
    {
        return $this->jobCategory
            ->withCount('jobPosts as total_job_posts')
            ->withCount(['jobPosts as total_employers' => function ($query) {
                $query->select(DB::raw('COUNT(DISTINCT employer_id)'));
            }])
            ->orderBy('total_employers', 'desc')
            ->limit(6)
            ->get();
    }

    public function getAllJobCategories($limit = 10)
    {
        return $jobCategories = $this->jobCategory
            ->withCount('jobPosts')
            ->with(['jobPosts' => function($query) {
                $query->select('id', 'title', 'job_category_id');
            }])
            ->limit($limit)
            ->get();
    }

    public function getAll()
    {
        return $this->jobCategory->all();
    }
}
