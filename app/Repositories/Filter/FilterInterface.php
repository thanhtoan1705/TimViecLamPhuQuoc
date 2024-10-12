<?php


namespace App\Repositories\Filter;

interface FilterInterface
{
    public function filterJob($selectedCategories, $selectedSalaries, $selectedKeywords, $selectedRanks, $selectedExperiences, $selectedJobTypes, $selectedPostedTime, $selectedLocation);

    public function filterEmployer($selectedLocation, $selectedCompanyTypes, $selectedYears, $selectedSizes);

    public function filterCandidate($selectedLocation, $selectedMajors, $selectedExperiences, $selectedEducations, $selectedSalaries);
}

