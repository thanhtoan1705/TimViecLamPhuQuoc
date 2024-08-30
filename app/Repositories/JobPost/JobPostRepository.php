<?php

namespace App\Repositories\JobPost;

use App\Models\JobPost;

class JobPostRepository implements JobPostInterface
{
    protected $jobPost;

    public function __construct(JobPost $jobPost)
    {
        $this->jobPost = $jobPost;
    }

    public function topEmployers($limit = 10)
    {
        return $this->jobPost
            ->selectRaw('employer_id, COUNT(*) as total_jobs')
            ->groupBy('employer_id')
            ->orderBy('total_jobs', 'DESC')
            ->limit($limit)
            ->get();
    }

    public function getAllJobPost($limit = 10)
    {
        $jobPosts = $this->jobPost->limit($limit)->get();

        $jobPosts = $jobPosts->groupBy(function ($item) {
            return $item->job_category->name;
        });


        return $jobPosts;
    }
}
