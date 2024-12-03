<?php

namespace App\Repositories\JobPost;

use App\Models\JobPost;
use App\Models\JobPostCandidate;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class JobPostRepository implements JobPostInterface
{
    protected $jobPost;

    public function __construct(JobPost $jobPost)
    {
        $this->jobPost = $jobPost;
    }

    public function topEmployers($limit = 6)
    {
        return $this->jobPost
            ->select('employer_id')
            ->whereHas('employer.userJobPackages', function ($query) {
                $query->whereHas('jobPostPackage', function ($q) {
                    $q->where('display_top', 1);
                })
                    ->where('expires_at', '>', now());
            })
            ->where('end_date', '>=', now())
            ->where('status', 1)
            ->with(['employer' => function ($query) {
                $query->select('id', 'company_name', 'company_logo', 'company_photo_cover', 'slug', 'address_id')
                    ->withCount('job_post as total_jobs')
                    ->with(['address', 'job_post' => function ($q) {
                        $q->latest()->take(3)->with('job_category', 'jobType', 'salary');
                    }]);
            }])
            ->distinct()
            ->take($limit)
            ->get()
            ->map(function ($post) {
                return $post->employer;
            });
    }

    public function getAllJobPost($limit = 10)
    {
        $jobPosts = $this->jobPost
            ->with(['employer.userJobPackages.jobPostPackage', 'job_category'])
            ->whereHas('employer')
            ->where('end_date', '>=', now())
            ->where('status', 1)
            ->get();

        $groupedJobPosts = $jobPosts->groupBy(function ($item) {
            return optional($item->job_category)->name ?? 'Uncategorized';
        });

        $topCategories = $groupedJobPosts
            ->sortByDesc(function($posts) {
                return $posts->count();
            })
            ->take(6);

        $topCategories->transform(function ($posts) {
            return $posts->sortByDesc('created_at')
                ->take(8)
                ->map(function ($post) {
                    if (!$post->employer) {
                        $post->package_labels = [];
                        return $post;
                    }

                    $labels = $post->employer->userJobPackages
                        ->filter(function ($package) {
                            $jobPostPackage = $package->jobPostPackage;
                            return $jobPostPackage && $package->expires_at
                                && $package->expires_at > now() && $jobPostPackage->status === 1;
                        })
                        ->map(fn($package) => $package->jobPostPackage->label)
                        ->filter()
                        ->toArray();
                    $post->package_labels = !empty($labels) ? $labels : [null];

                    return $post;
                });
        });

        return $topCategories;
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

    public function getBestJobs()
    {
        return $this->jobPost
            ->with(['employer.userJobPackages.jobPostPackage', 'job_category', 'jobType', 'skills'])
            ->whereHas('employer')
            ->whereHas('employer.userJobPackages', function ($query) {
                $query->whereHas('jobPostPackage', function ($q) {
                    $q->where('display_best', 1);
                })
                    ->where('expires_at', '>', now());
            })
            ->where('end_date', '>=', now())
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc')
            ->get();
    }

    public function getHasteJobs()
    {
        return $this->jobPost
            ->with(['employer.userJobPackages.jobPostPackage', 'job_category', 'jobType', 'skills'])
            ->whereHas('employer')
            ->whereHas('employer.userJobPackages', function ($query) {
                $query->whereHas('jobPostPackage', function ($q) {
                    $q->where('display_haste', 1);
                })
                    ->where('expires_at', '>', now());
            })
            ->where('end_date', '>=', now())
            ->where('status', 1)
            ->get();
    }

    // Đếm số lượng việc làm còn hạn ứng tuyển tất cả
    public function countActiveJobPosts()
    {
        return $this->jobPost->where('end_date', '>=', Carbon::now())->count();
    }

    // Đếm số lượng việc làm còn hạn ứng tuyển hôm nay
    public function countTodayJobPosts()
    {
        return JobPost::whereDate('end_date', Carbon::today())->count();
    }
}
