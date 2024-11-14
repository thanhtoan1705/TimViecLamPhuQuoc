<?php

namespace App\Repositories\Job;

use App\Models\JobPost;
use App\Models\JobPostCandidate;
use Illuminate\Support\Facades\DB;

class JobRepository implements JobInterface
{

    protected $jobPost;

    public function __construct(JobPost $jobPost)
    {
        $this->jobPost = $jobPost;
    }

    public function getAllJobPaginated($perPage = 12, $sortBy = 'created_at', $sortOrder = 'desc')
    {
        return $this->jobPost::orderBy($sortBy, $sortOrder)->paginate($perPage);
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

    public function applyForJob($jobPostId, $candidateId, $file, $description)
    {
        JobPostCandidate::create([
            'job_post_id' => $jobPostId,
            'candidate_id' => $candidateId,
            'file' => $file,
            'description' => $description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }

    public function findLastApplication($candidateId, $jobId)
    {
        return DB::table('job_post_candidates')
            ->where('candidate_id', $candidateId)
            ->where('job_post_id', $jobId)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function findJobById($id)
    {
        return $this->jobPost::find($id);
    }

    public function findJobsByMajorAndSkills($candidate)
    {
        $majorId = $candidate->major_id;


        $skillIds = $candidate->skills->pluck('id')->toArray();

        $jobs = $this->jobPost::where('major_id', $majorId)
            ->whereHas('skills', function ($query) use ($skillIds) {
                $query->whereIn('skills.id', $skillIds);
            })
            ->get();

        return $jobs;
    }
    public function findBySlug(string $jobSlug)
    {
        return $this->jobPost::where('slug', $jobSlug)->first();
    }



}
