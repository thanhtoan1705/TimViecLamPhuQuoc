<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Candidate\CandidateRepository;
use App\Repositories\Employer\EmployerInterface;
use App\Repositories\JobCategory\JobCategoryInterface;
use App\Repositories\JobPost\JobPostInterface;

class HomeController extends Controller
{

    protected $employerRepository;
    protected $jobPostRepository;
    protected $jobCategoryRepository;
    protected $candidateRepository;

    public function __construct(
        EmployerInterface    $employerRepository,
        JobPostInterface     $jobPostRepository,
        JobCategoryInterface $jobCategoryRepository,
        CandidateRepository  $candidateRepository,)
    {
        $this->employerRepository = $employerRepository;
        $this->jobPostRepository = $jobPostRepository;
        $this->jobCategoryRepository = $jobCategoryRepository;
        $this->candidateRepository = $candidateRepository;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $jobPostRepository = $this->jobPostRepository->getAllJobPost();

        $jobCategoriesRepository = $this->jobCategoryRepository->getAllJobCategories();

        $employers = $this->employerRepository->getAllEmployers();

        $topEmployers = $this->jobPostRepository->topEmployers();

        $hotJobCategories = $this->jobCategoryRepository->hotJobCategories();

        $savedJobs = $this->candidateRepository->getSavedJobs();
        $savedJobIds = $savedJobs->pluck('id')->toArray();

        $bestJobs = $this->jobPostRepository->getBestJobs();
        $hasteJobs = $this->jobPostRepository->getHasteJobs();

        $jobPostCountAll = $this->jobPostRepository->countActiveJobPosts();
        $jobPostCountToday = $this->jobPostRepository->countTodayJobPosts();

        $data = [
            'jobpost' => $jobPostRepository,
            'jobCategories' => $jobCategoriesRepository,
            'employers' => $employers,
            'topEmployers' => $topEmployers,
            'hotJobCategories' => $hotJobCategories,
            'bestJobs' => $bestJobs,
            'hasteJobs' => $hasteJobs,
            'savedJobIds' => $savedJobIds,
            'jobPostCountAll' => $jobPostCountAll,
            'jobPostCountToday' => $jobPostCountToday,
        ];

        return view("client.home", $data);
    }

    public function about()
    {
        return view("client.about.index");
    }
}
