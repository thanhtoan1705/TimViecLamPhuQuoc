<?php

namespace App\Http\Controllers\Client\Job;

use App\Http\Controllers\Controller;
use App\Repositories\Job\JobInterface;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;

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
        $lastApplication = $this->jobRepository->findLastApplication(auth()->id(), $jobId);

        if (\Carbon\Carbon::parse($lastApplication->created_at)->diffInHours(now()) < 24) {
            Flasher::error('Bạn đã nộp CV cho bài đăng này. Vui lòng đợi 24 giờ để nộp lại.');
            return redirect()->back();
        }

        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'description' => 'required|string|max:1000',
        ]);

        $filePath = $request->file('resume')->store('resumes', 'public');
        $this->jobRepository->applyForJob($jobId, auth()->id(), $filePath, $request->input('description'));

        Flasher::success('Đã nộp đơn thành công.');
        return redirect()->back();
    }

}
