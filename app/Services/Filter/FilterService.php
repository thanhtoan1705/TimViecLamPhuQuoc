<?php

namespace App\Services\Filter;

use App\Models\Address;
use App\Models\Employer;
use App\Models\Job_category;
use App\Models\JobPost;
use App\Models\Province;
use App\Models\Salary;
use Illuminate\Support\Facades\DB;

class FilterService
{
    protected $jobPost;
    protected $jobCategory;
    protected $salary;
    protected $employer;

    public function __construct(
        JobPost      $jobPost,
        Job_category $jobCategory,
        Salary       $salary,
        Employer     $employer
    )
    {
        $this->jobPost = $jobPost;
        $this->jobCategory = $jobCategory;
        $this->salary = $salary;
        $this->employer = $employer;
    }

    public function getProvince()
    {
        return Province::with('districts')
        ->get()
            ->pluck('name')
            ->unique()
            ->values();
    }

    public function getJobCategories()
    {
        return $this->jobCategory
            ->withCount('jobPosts')
            ->having('job_posts_count', '>', 0)
            ->orderBy('job_posts_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function getSalaries()
    {
        return $this->salary
            ->withCount('jobPosts')
            ->having('job_posts_count', '>', 0)
            ->orderBy('job_posts_count', 'desc')
            ->limit(5)
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
            ->leftJoin('job_posts', 'job_posts.rank_id', '=', 'ranks.id')
            ->select('ranks.id', 'ranks.name', DB::raw('COUNT(job_posts.id) as job_count'))
            ->groupBy('ranks.id', 'ranks.name')
            ->having('job_count', '>', 0)
            ->orderBy('job_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function getExperiences()
    {
        return DB::table('experiences')
            ->leftJoin('job_posts', 'job_posts.experience_id', '=', 'experiences.id')
            ->select('experiences.id', 'experiences.name', DB::raw('COUNT(job_posts.id) as job_count'))
            ->groupBy('experiences.id', 'experiences.name')
            ->having('job_count', '>', 0)
            ->orderBy('job_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function getJobTypes()
    {
        return DB::table('job_types')
            ->leftJoin('job_posts', 'job_posts.job_type_id', '=', 'job_types.id')
            ->select('job_types.id', 'job_types.name', DB::raw('COUNT(job_posts.id) as job_count'))
            ->groupBy('job_types.id', 'job_types.name')
            ->having('job_count', '>', 0)
            ->orderBy('job_count', 'desc')
            ->limit(5)
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

    public function getCompanyTypes()
    {
        return $this->employer
            ->select('company_type', DB::raw('COUNT(id) as company_count'))
            ->groupBy('company_type')
            ->orderBy('company_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function getYears()
    {
        return $this->employer
            ->select(DB::raw('YEAR(since) as year'), DB::raw('COUNT(id) as company_count'))
            ->groupBy(DB::raw('YEAR(since)'))
            ->orderBy('year', 'desc')
            ->limit(5)
            ->get();
    }

    public function getSizes()
    {
        return $this->employer
            ->select('company_size', DB::raw('COUNT(id) as company_count'))
            ->groupBy('company_size')
            ->orderBy('company_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function filterJobs($selectedCategories, $selectedSalaries, $selectedKeywords, $selectedRanks, $selectedExperiences, $selectedJobTypes, $selectedPostedTime, $selectedLocation)
    {
        $jobs = $this->jobPost->query();

        if (!empty($selectedLocation)) {
            $jobs->where('address', 'LIKE', '%' . $selectedLocation . '%');
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

    public function filterEmployer($selectedLocation, $selectedCompanyTypes, $selectedYears, $selectedSizes)
    {
        $query = $this->employer->query();

        if (!empty($selectedLocation)) {
            $query->whereHas('address.province', function ($query) use ($selectedLocation) {
                $query->where('name', 'LIKE', '%' . $selectedLocation . '%');
            });
        }

        if (!empty($selectedCompanyTypes)) {
            $query->whereIn('company_type', $selectedCompanyTypes);
        }

        if (!empty($selectedYears)) {
            $query->whereIn(DB::raw('YEAR(since)'), $selectedYears);
        }

        if (!empty($selectedSizes)) {
            $query->whereIn('company_size', $selectedSizes);
        }

        return $query;
    }
}
