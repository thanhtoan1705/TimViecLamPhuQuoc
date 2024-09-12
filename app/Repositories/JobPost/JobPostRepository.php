<?php

namespace App\Repositories\JobPost;

use App\Models\JobPost;
use App\Models\JobPostCandidate;
use Illuminate\Support\Facades\Auth;

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

    public function getApplyCandidatesByJobPost($jobPostID = null, $sortOrder = 'newest')
    {
        $employerId = Auth::user()->employer->id;

        $query = JobPostCandidate::query()
            ->whereHas('jobPost', function ($q) use ($employerId) {
                $q->where('employer_id', $employerId);
            });

        if ($jobPostID) {
            $query->where('job_post_id', $jobPostID);
        }

        if ($sortOrder === 'newest') {
            $query->orderBy('created_at', 'desc');
        } else {
            $query->orderBy('created_at', 'asc');
        }

        return $query->get();
    }

    public function unApplyCandidate($jobpostId, $candidateId)
    {
        return JobPostCandidate::where('job_post_id', $jobpostId)
        ->where('candidate_id', $candidateId)
            ->delete();
    }
}
