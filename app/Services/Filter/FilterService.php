<?php

namespace App\Services\Filter;

use App\Models\Candidate;
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
    protected $candidate;

    public function __construct(
        JobPost      $jobPost,
        Job_category $jobCategory,
        Salary       $salary,
        Employer  $employer,
        Candidate $candidate,
    )
    {
        $this->jobPost = $jobPost;
        $this->jobCategory = $jobCategory;
        $this->salary = $salary;
        $this->employer = $employer;
        $this->candidate = $candidate;
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
            ->whereHas('jobPosts', function ($query) {
                $query->where('end_date', '>', now());
            })
            ->withCount(['jobPosts' => function ($query) {
                $query->where('end_date', '>', now());
            }])
            ->having('job_posts_count', '>', 0)
            ->orderBy('job_posts_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function getSalaries()
    {
        return $this->salary
            ->whereHas('jobPosts', function ($query) {
                $query->where('end_date', '>', now());
            })
            ->withCount(['jobPosts' => function ($query) {
                $query->where('end_date', '>', now());
            }])
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
            ->where('end_date', '>', now())
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
            ->leftJoin('job_posts', function ($join) {
                $join->on('job_posts.rank_id', '=', 'ranks.id')
                    ->where('job_posts.end_date', '>', now());
            })
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
            ->leftJoin('job_posts', function ($join) {
                $join->on('job_posts.experience_id', '=', 'experiences.id')
                    ->where('job_posts.end_date', '>', now());
            })
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
            ->leftJoin('job_posts', function ($join) {
                $join->on('job_posts.job_type_id', '=', 'job_types.id')
                    ->where('job_posts.end_date', '>', now());
            })
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
            '1_day' => $this->jobPost->where('created_at', '>=', now()->subDay())->where('end_date', '>', now())->count(),
            '7_days' => $this->jobPost->where('created_at', '>=', now()->subDays(7))->where('end_date', '>', now())->count(),
            '30_days' => $this->jobPost->where('created_at', '>=', now()->subDays(30))->where('end_date', '>', now())->count(),
        ];
    }

    public function getCompanyTypes()
    {
        return $this->employer
            ->select('company_type', DB::raw('COUNT(id) as company_count'))
            ->whereNotNull('company_type')
            ->groupBy('company_type')
            ->orderBy('company_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function getYears()
    {
        return $this->employer
            ->select(DB::raw('YEAR(since) as year'), DB::raw('COUNT(id) as company_count'))
            ->whereNotNull('since')
            ->groupBy(DB::raw('YEAR(since)'))
            ->orderBy('year', 'desc')
            ->limit(5)
            ->get();
    }

    public function getSizes()
    {
        return $this->employer
            ->select('company_size', DB::raw('COUNT(id) as company_count'))
            ->whereNotNull('company_size')
            ->groupBy('company_size')
            ->orderBy('company_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function getCandidateExperiences()
    {
        return DB::table('experiences')
            ->leftJoin('candidates', 'candidates.experience_id', '=', 'experiences.id') // Kết nối với bảng candidates
            ->select('experiences.id', 'experiences.name', DB::raw('COUNT(candidates.id) as candidate_count')) // Đếm số ứng viên
            ->groupBy('experiences.id', 'experiences.name')
            ->having('candidate_count', '>', 0)
            ->orderBy('candidate_count', 'desc')
            ->limit(5)
            ->get();
    }


    public function getCandidateMajors()
    {
        return DB::table('majors')
            ->leftJoin('candidates', 'candidates.major_id', '=', 'majors.id')
            ->select('majors.id', 'majors.name', DB::raw('COUNT(candidates.id) as candidate_count'))
            ->groupBy('majors.id', 'majors.name')
            ->having('candidate_count', '>', 0)
            ->orderBy('candidate_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function getEducations()
    {
        return DB::table('education')
            ->select(
                DB::raw('MIN(education.id) as id'), // Lấy ID đầu tiên trong nhóm
                'education.institution_name',
                DB::raw('COUNT(education.id) as candidate_count')
            )
            ->leftJoin('candidates', 'education.candidate_id', '=', 'candidates.id')
            ->groupBy('education.institution_name')
            ->having('candidate_count', '>', 0)
            ->orderBy('candidate_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function getCandidateSalaries()
    {
        return DB::table('salaries')
            ->leftJoin('candidates', 'candidates.salary_id', '=', 'salaries.id')
            ->select('salaries.id', 'salaries.name', DB::raw('COUNT(candidates.id) as candidate_count'))
            ->groupBy('salaries.id', 'salaries.name')
            ->having('candidate_count', '>', 0)
            ->orderBy('candidate_count', 'desc')
            ->limit(5)
            ->get();
    }

    public function filterJobs($selectedCategories, $selectedSalaries, $selectedKeywords, $selectedRanks, $selectedExperiences, $selectedJobTypes, $selectedPostedTime, $selectedLocation)
    {
        $jobs = $this->jobPost->query();

        $jobs->where('end_date', '>', now())->where('status', '1');

        if (!empty($selectedLocation)) {
            $jobs->whereHas('employer.address.province', function ($query) use ($selectedLocation) {
                $query->where('name', 'LIKE', '%' . $selectedLocation . '%');
            });
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

    public function filterCandidate($selectedLocation, $selectedMajors, $selectedExperiences, $selectedEducations, $selectedSalaries)
    {
        $query = $this->candidate->query();

        if (!empty($selectedLocation)) {
            if (is_array($selectedLocation)) {
                $query->whereHas('address.province', function ($q) use ($selectedLocation) {
                    $q->whereIn('name', $selectedLocation);
                });
            } else {
                $query->whereHas('address.province', function ($q) use ($selectedLocation) {
                    $q->where('name', 'LIKE', '%' . $selectedLocation . '%');
                });
            }
        }

        if (!empty($selectedMajors)) {
            $query->whereIn('major_id', (array)$selectedMajors);
        }

        if (!empty($selectedExperiences)) {
            $query->whereHas('experience', function ($query) use ($selectedExperiences) {
                $query->whereIn('id', (array)$selectedExperiences);
            });
        }

        if (!empty($selectedEducations)) {
            $query->whereHas('educations', function ($q) use ($selectedEducations) {
                $q->whereIn('institution_name', (array)$selectedEducations);
            });
        }

        if (!empty($selectedSalaries) && is_array($selectedSalaries)) {
            $query->whereHas('salary', function ($query) use ($selectedSalaries) {
                $query->whereIn('id', $selectedSalaries);
            });
        } elseif (!empty($selectedSalaries)) {
            $query->whereHas('salary', function ($query) use ($selectedSalaries) {
                $query->where('id', $selectedSalaries);
            });
        }

        return $query;
    }
}
