<?php

namespace App\Http\Controllers\Client\Job;

use App\Http\Controllers\Controller;
use App\Repositories\Job\JobInterface;

class JobController extends Controller
{
    protected $jobRepository;

    public function __construct(JobInterface $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function single($employerSlug, $jobSlug)
    {
        $job = $this->jobRepository->findBySlugs($employerSlug, $jobSlug);
        $jobsInCompany = $this->jobRepository->findJobsByEmployer($job->employer_id);
        $jobsCount = $jobsInCompany->count();
        $otherJobs = $this->jobRepository->findOtherJobsByEmployer($job->employer_id, $job->id);
        $relatedJobs = $this->jobRepository->findJobsByMajor($job->major_id, $job->id);

        $data = [
            'job' => $job,
            'jobsInCompany' => $jobsInCompany,
            'otherJobs' => $otherJobs,
            'relatedJobs' => $relatedJobs,
            'jobsCount' => $jobsCount,
        ];

        return view('client.job.single', $data);
    }

}
