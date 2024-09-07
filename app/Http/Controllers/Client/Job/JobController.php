<?php

namespace App\Http\Controllers\Client\Job;

use App\Http\Controllers\Controller;
use App\Repositories\Job\JobInterface;
use Illuminate\Http\Request;
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

    public function applyForJob(Request $request, $jobId)
    {
        $request->validate([
            'resume' => 'required|file|max:5120',
            'description' => 'required|string|max:1000',
        ]);


        $filePath = $request->file('resume')->store('resumes', 'public');
        $this->jobRepository->applyForJob($jobId, auth()->id(), $filePath, $request->input('description'));
        flash('success', 'Đã nộp đơn thành công.');
        return redirect()->back();
    }


}
