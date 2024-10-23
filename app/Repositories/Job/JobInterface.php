<?php


namespace App\Repositories\Job;

interface JobInterface
{
    public function getAllJobPaginated($perPage, $sortBy, $sortOrder);

    public function findBySlugs(string $employerSlug, string $jobSlug);

    public function findJobsByEmployer($employer_id);

    public function findOtherJobsByEmployer(int $employerId, int $excludeJobId);

    public function findJobsByMajor(int $majorId, int $excludeJobId);

    public function applyForJob($jobPostId, $candidateId, $file, $description);

    public function findLastApplication($candidateId, $jobId);

    public function findJobById($id);

    public function findJobsByMajorAndSkills($candidate);

    public function findBySlug(string $jobSlug);


}

