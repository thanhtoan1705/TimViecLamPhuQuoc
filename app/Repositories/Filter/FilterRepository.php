<?php

namespace App\Repositories\Filter;

use App\Services\Filter\FilterService;

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
        $selectedLocation = null,
    )
    {
        $filteredData = [
            'categories' => $this->filterService->getJobCategories(),
            'salaries' => $this->filterService->getSalaries(),
            'keywords' => $this->filterService->getKeywords()->values()->all(),
            'ranks' => $this->filterService->getRanks(),
            'experiences' => $this->filterService->getExperiences(),
            'jobTypes' => $this->filterService->getJobTypes(),
            'jobsCount1Day' => $this->filterService->getJobsCountByTime()['1_day'],
            'jobsCount7Days' => $this->filterService->getJobsCountByTime()['7_days'],
            'jobsCount30Days' => $this->filterService->getJobsCountByTime()['30_days'],
            'locations' => $this->filterService->getProvince(),
        ];

        $filteredData['jobs'] = $this->filterService->filterJobs(
            $selectedCategories,
            $selectedSalaries,
            $selectedKeywords,
            $selectedRanks,
            $selectedExperiences,
            $selectedJobTypes,
            $selectedPostedTime,
            $selectedLocation
        );

        return $filteredData;
    }

    public function filterEmployer(
        $selectedLocation = null,
        $selectedCompanyTypes = [],
        $selectedYears = [],
        $selectedSizes = []
    )
    {
        return [
            'locations' => $this->filterService->getProvince(),
            'companyTypes' => $this->filterService->getCompanyTypes(),
            'years' => $this->filterService->getYears(),
            'sizes' => $this->filterService->getSizes(),
            'employers' => $this->filterService->filterEmployer(
                $selectedLocation,
                $selectedCompanyTypes,
                $selectedYears,
                $selectedSizes
            ),
        ];
    }

    public function filterCandidate(
        $selectedLocation = null,
        $selectedMajors = [],
        $selectedExperiences = [],
        $selectedEducations = [],
        $selectedSalaries = []
    )
    {
        return [
            'locations' => $this->filterService->getProvince(),
            'salaries' => $this->filterService->getCandidateSalaries(),
            'experiences' => $this->filterService->getCandidateExperiences(),
            'majors' => $this->filterService->getCandidateMajors(),
            'educations' => $this->filterService->getEducations(),
            'candidates' => $this->filterService->filterCandidate(
                $selectedLocation,
                $selectedMajors,
                $selectedExperiences,
                $selectedEducations,
                $selectedSalaries
            ),
        ];
    }
}
