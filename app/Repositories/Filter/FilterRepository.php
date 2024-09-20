<?php

namespace App\Repositories\Filter;

use App\Services\Filter\FilterService;
use App\Repositories\Filter\FilterInterface;

class FilterRepository implements FilterInterface
{
    protected $filterService;

    public function __construct(FilterService $filterService)
    {
        $this->filterService = $filterService;
    }

    public function filterJob(
        $selectedCategories = [],
        $selectedSalaries = [],
        $selectedKeywords = [],
        $selectedRanks = [],
        $selectedExperiences = [],
        $selectedJobTypes = [],
        $selectedPostedTime = null,
        $selectedLocations = []
    )
    {
        return [
            'categories' => $this->filterService->getJobCategories(),
            'salaries' => $this->filterService->getSalaries(),
            'keywords' => $this->filterService->getKeywords()->values()->all(),
            'ranks' => $this->filterService->getRanks(),
            'experiences' => $this->filterService->getExperiences(),
            'jobTypes' => $this->filterService->getJobTypes(),
            'jobsCount1Day' => $this->filterService->getJobsCountByTime()['1_day'],
            'jobsCount7Days' => $this->filterService->getJobsCountByTime()['7_days'],
            'jobsCount30Days' => $this->filterService->getJobsCountByTime()['30_days'],
            'jobs' => $this->filterService->filterJobs(
                $selectedCategories,
                $selectedSalaries,
                $selectedKeywords,
                $selectedRanks,
                $selectedExperiences,
                $selectedJobTypes,
                $selectedPostedTime,
                $selectedLocations
            ),
            'locations' => $this->filterService->getLocations(),
        ];
    }
}
