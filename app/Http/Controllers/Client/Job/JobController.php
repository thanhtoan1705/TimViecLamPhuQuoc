<?php

namespace App\Http\Controllers\Client\Job;

use App\Http\Controllers\Controller;
use App\Repositories\Filter\FilterInterface;
use App\Repositories\Job\JobInterface;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use App\Services\Search\SearchService;

class JobController extends Controller
{
    protected $jobRepository;
    protected $filterRepository;
    protected $searchService;


    public function __construct(JobInterface $jobRepository,
                                FilterInterface $filterRepository,
                                SearchService $searchService)
    {
        $this->jobRepository = $jobRepository;
        $this->filterRepository = $filterRepository;
        $this->searchService = $searchService;
    }

    public function index(Request $request)
    {
        $selectedCategories = $request->input('categories', []);
        $selectedSalaries = $request->input('salaries', []);
        $selectedKeywords = $request->input('keywords', []);
        $selectedRanks = $request->input('ranks', []);
        $selectedExperiences = $request->input('experiences', []);
        $selectedJobTypes = $request->input('job_types', []);
        $selectedPostedTime = $request->input('posted_time', null);
        $selectedLocations = $request->input('locations', []);

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

        $filteredData = $this->filterRepository->filterJob(
            $selectedCategories,
            $selectedSalaries,
            $selectedKeywords,
            $selectedRanks,
            $selectedExperiences,
            $selectedJobTypes,
            $selectedPostedTime,
            $selectedLocations,
        );

        $filteredJobsQuery = $filteredData['jobs'];

        $filteredJobs = $filteredJobsQuery->orderBy($sortBy, $sortOrder)->paginate($perPage);

        $searchJob = $request->only(['category', 'location', 'salary', 'experience', 'keyword']);
        $jobResult = $this->searchService->searchJobs($searchJob);

        $data = [
            'jobs' => $filteredJobs,
            'totalJobs' => $filteredJobs->total(),
            'perPage' => $perPage,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
            'categories' => $filteredData['categories'],
            'salaries' => $filteredData['salaries'],
            'keywords' => $filteredData['keywords'],
            'ranks' => $filteredData['ranks'],
            'experiences' => $filteredData['experiences'],
            'jobTypes' => $filteredData['jobTypes'],
            'jobsCount1Day' => $filteredData['jobsCount1Day'],
            'jobsCount7Days' => $filteredData['jobsCount7Days'],
            'jobsCount30Days' => $filteredData['jobsCount30Days'],
            'locations' => $filteredData['locations'],
            'jobResult' => $jobResult,
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
        $lastApplication = $this->jobRepository->findLastApplication(auth()->user()->candidate->id, $jobId);

        if ($lastApplication && \Carbon\Carbon::parse($lastApplication->created_at)->diffInHours(now()) < 24) {
            Flasher::error('Bạn đã nộp CV cho bài đăng này. Vui lòng đợi 24 giờ để nộp lại.');
            return redirect()->back();
        }

        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'description' => 'required|string|max:1000',
        ]);

        $filePath = $request->file('resume')->store('resumes', 'public');
        $this->jobRepository->applyForJob($jobId, auth()->user()->candidate->id, $filePath, $request->input('description'));



        Flasher::success('Đã nộp đơn thành công.');
        return redirect()->back();
    }

}
