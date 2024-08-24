<?php


namespace App\Repositories\Job;

interface JobInterface
{
    public function findBySlugs(string $employerSlug, string $jobSlug);

    public function findJobsByEmployer($employer_id);

    public function findOtherJobsByEmployer(int $employerId, int $excludeJobId);

    public function findJobsByMajor(int $majorId, int $excludeJobId);

}

