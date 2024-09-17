<?php

namespace App\Http\Controllers\Client\Job;

use App\Http\Controllers\Controller;
use App\Repositories\Filter\FilterInterface;
use App\Repositories\Job\JobInterface;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;

class JobController extends Controller
{
    protected $jobRepository;
    protected $filterRepository;


    public function __construct(JobInterface $jobRepository, FilterInterface $filterRepository)
    {
        $this->jobRepository = $jobRepository;
        $this->filterRepository = $filterRepository;
    }

    public function index(Request $request)
    {
        $selectedCategories = $request->input('categories', []);
        $selectedSalaries = $request->input('salaries', []);
        $selectedKeywords = $request->input('keywords', []);

        $perPage = $request->query('per_page', 12);
        $sortBy = $request->query('sort_by', 'created_at');
        $sortOrder = $request->query('sort_order', 'desc');

        $validSortBy = ['created_at', 'rating'];
        $validSortOrders = ['asc', 'desc'];

        if (!in_array($sortBy, $validSortBy)) {
            $sortBy = 'created_at';
        }
        if (!in_array($sortOrder, $validSortOrders)) {
            $sortOrder = 'desc';
        }

        $filteredData = $this->filterRepository->filterJob($selectedCategories, $selectedSalaries, $selectedKeywords);

        $jobCategories = $filteredData['categories'];
        $salaries = $filteredData['salaries'];
        $keywords = $filteredData['keywords'];

        $filteredJobsQuery = $filteredData['jobs'];

        $filteredJobs = $filteredJobsQuery->orderBy($sortBy, $sortOrder)->paginate($perPage);

        if ($request->ajax()) {
            return view('client.job.partials.job_list', ['job' => $filteredJobs])->render();
        }

        $data = [
            'job' => $filteredJobs,
            'totalJobs' => $filteredJobs->total(),
            'perPage' => $perPage,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
            'categories' => $jobCategories,
            'salaries' => $salaries,
            'keywords' => $keywords,
        ];

        return view('client.job.index', $data);
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
