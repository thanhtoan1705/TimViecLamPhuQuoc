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

    public function getAllJobPost($limit = 10)
    {
        return $this->jobPost->limit($limit)->get();
    }
}
