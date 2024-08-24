<?php

namespace App\Repositories\Job;

use App\Models\Employer;
use App\Models\JobPost;
use App\Repositories\Job\JobInterface;

class JobRepository implements JobInterface
{

    protected $jobPost;

    public function __construct(JobPost $jobPost)
    {
        $this->jobPost = $jobPost;
    }
    public function findBySlugs(string $employerSlug, string $jobSlug)
    {
        return $this->jobPost::whereHas('employer', function ($query) use ($employerSlug) {
            $query->where('slug', $employerSlug);
        })->where('slug', $jobSlug)->first();
    }


    public function findJobsByEmployer($employer_id)
    {
        return $this->jobPost::where('employer_id', $employer_id)->get();
    }

    public function findOtherJobsByEmployer(int $employerId, int $excludeJobId)
    {
        return $this->jobPost::where('employer_id', $employerId)
            ->where('id', '!=', $excludeJobId)
            ->take(5)
            ->get();
    }

    public function findJobsByMajor(?int $majorId, int $excludeJobId)
    {
        if ($majorId === null) {
            return collect();
        }

        $jobs = $this->jobPost::whereHas('majors', function ($query) use ($majorId) {
            $query->where('majors.id', $majorId);
        })
            ->where('id', '!=', $excludeJobId)
            ->limit(10)
            ->get();

        return $jobs;
    }






}
