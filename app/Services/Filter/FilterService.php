<?php

namespace App\Services\Filter;

use App\Models\Job_category;
use App\Models\JobPost;
use App\Models\Salary;
use Illuminate\Support\Facades\DB;

class FilterService
{
    protected $jobPost;
    protected $jobCategory;
    protected $salary;

    public function __construct(JobPost $jobPost, Job_category $jobCategory, Salary $salary)
    {
        $this->jobPost = $jobPost;
        $this->jobCategory = $jobCategory;
        $this->salary = $salary;
    }

    public function getLocations()
    {
        return $this->jobPost
            ->select('address')
            ->distinct()
            ->pluck('address')
            ->sort()
            ->take(5)
            ->values();
    }


    public function getJobCategories()
    {
        return $this->jobCategory
            ->withCount('jobPosts')
            ->having('job_posts_count', '>', 0)
            ->take(5)
            ->get();
    }

    public function getSalaries()
    {
        return $this->salary
            ->withCount('jobPosts')
            ->having('job_posts_count', '>', 0)
            ->take(5)
            ->get();
    }

    public function getKeywords()
    {
        return DB::table('job_posts')
            ->select(DB::raw('meta_keyword'))
            ->whereNotNull('meta_keyword')
            ->get()
            ->flatMap(function ($jobPost) {
                return explode(',', $jobPost->meta_keyword);
            })
            ->map(function ($keyword) {
                return trim($keyword);
            })
            ->filter()
            ->countBy()
            ->map(function ($count, $keyword) {
                return ['keyword' => $keyword, 'job_count' => $count];
            })
            ->sortByDesc('job_count')
            ->take(5);
    }

    public function getRanks()
    {
        return DB::table('ranks')
            ->select('ranks.id', 'ranks.name', DB::raw('COUNT(job_posts.id) as job_count'))
            ->leftJoin('job_posts', 'job_posts.rank_id', '=', 'ranks.id')
            ->groupBy('ranks.id', 'ranks.name')
            ->having('job_count', '>', 0)
            ->take(5)
            ->get();
    }

    public function getExperiences()
    {
        return DB::table('experiences')
            ->select('experiences.id', 'experiences.name', DB::raw('COUNT(job_posts.id) as job_count'))
            ->leftJoin('job_posts', 'job_posts.experience_id', '=', 'experiences.id')
            ->groupBy('experiences.id', 'experiences.name')
            ->having('job_count', '>', 0)
            ->take(5)
            ->get();
    }

    public function getJobTypes()
    {
        return DB::table('job_types')
            ->select('job_types.id', 'job_types.name', DB::raw('COUNT(job_posts.id) as job_count'))
            ->leftJoin('job_posts', 'job_posts.job_type_id', '=', 'job_types.id')
            ->groupBy('job_types.id', 'job_types.name')
            ->having('job_count', '>', 0)
            ->take(5)
            ->get();
    }

    public function getJobsCountByTime()
    {
        return [
            '1_day' => $this->jobPost->where('created_at', '>=', now()->subDay())->count(),
            '7_days' => $this->jobPost->where('created_at', '>=', now()->subDays(7))->count(),
            '30_days' => $this->jobPost->where('created_at', '>=', now()->subDays(30))->count(),
        ];
    }

    public function filterJobs($selectedCategories, $selectedSalaries, $selectedKeywords, $selectedRanks, $selectedExperiences, $selectedJobTypes, $selectedPostedTime, $selectedLocations)
    {
        $jobs = $this->jobPost->query();

        if (!empty($selectedLocations)) {
            $jobs->whereIn('address', $selectedLocations);
        }

        if (!empty($selectedCategories)) {
            $jobs->whereIn('job_category_id', $selectedCategories);
        }

        if (!empty($selectedSalaries)) {
            $jobs->whereIn('salary_id', $selectedSalaries);
        }

        if (!empty($selectedKeywords)) {
            $jobs->where(function ($query) use ($selectedKeywords) {
                foreach ($selectedKeywords as $keyword) {
                    $query->orWhere('meta_keyword', 'LIKE', '%' . $keyword . '%');
                }
            });
        }

        if (!empty($selectedRanks)) {
            $jobs->whereIn('rank_id', $selectedRanks);
        }

        if (!empty($selectedExperiences)) {
            $jobs->whereIn('experience_id', $selectedExperiences);
        }

        if (!empty($selectedJobTypes)) {
            $jobs->whereIn('job_type_id', $selectedJobTypes);
        }

        if ($selectedPostedTime) {
            switch ($selectedPostedTime) {
                case '1_day':
                    $jobs->where('created_at', '>=', now()->subDay());
                    break;
                case '7_days':
                    $jobs->where('created_at', '>=', now()->subDays(7));
                    break;
                case '30_days':
                    $jobs->where('created_at', '>=', now()->subDays(30));
                    break;
            }
        }

        return $jobs;
    }
}
