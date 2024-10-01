<?php

namespace App\Repositories\Employer;

interface EmployerInterface
{
    public function getAllEmployers();

    public function getAllEmployersPaginate($query, $sortBy, int $perPage);

    public function getJobPostsByEmployerSlug($slug, $perPage = 2);

    public function getEmployerByStatusPaginate(int $status, int $paginate);

    public function getSuggestedCandidatesByEmployer($employerId);

    public function getAllCandidates();

    public function searchCandidates(array $filters, $sortOrder = 'newest');

    public function getSavedCandidatesByEmployer($employerId, $sortOrder = 'newest');

    public function saveCandidate($employerId, $candidateId);

    public function unsaveCandidate($employerId, $candidateId);

}
