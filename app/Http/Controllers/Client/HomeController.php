<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Candidate\CandidateRepository;
use App\Repositories\Employer\EmployerInterface;
use App\Repositories\Job\JobRepository;
use App\Repositories\JobCategory\JobCategoryInterface;
use App\Repositories\JobPost\JobPostInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller{

    protected $employerRepository;
    protected $jobPostRepository;
    protected $jobCategoryRepository;
    protected $candidateRepository;
    protected $jobRepository;

    public function __construct(
        EmployerInterface    $employerRepository,
        JobPostInterface     $jobPostRepository,
        JobCategoryInterface $jobCategoryRepository,
        CandidateRepository $candidateRepository,
        JobRepository $jobRepository,)
    {
        $this->employerRepository = $employerRepository;
        $this->jobPostRepository = $jobPostRepository;
        $this->jobCategoryRepository = $jobCategoryRepository;
        $this->candidateRepository = $candidateRepository;
        $this->jobRepository = $jobRepository;
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(){
        $jobPostRepository = $this->jobPostRepository->getAllJobPost();

        $jobCategoriesRepository = $this->jobCategoryRepository->getAllJobCategories();

        $employers = $this->employerRepository->getAllEmployers();

        $topEmployers = $this->jobPostRepository->topEmployers();

        $hotJobCategories = $this->jobCategoryRepository->hotJobCategories();

        $savedJobs = $this->candidateRepository->getSavedJobs();
        $savedJobIds = $savedJobs->pluck('id')->toArray();

        $jobPostPackages = $this->jobRepository->getAllJobPostPackages();

        $data = [
            'jobpost' => $jobPostRepository,
            'jobCategories' => $jobCategoriesRepository,
            'employers' => $employers,
            'topEmployers' => $topEmployers,
            'hotJobCategories' => $hotJobCategories,
            'savedJobIds' => $savedJobIds,
            'jobPackages' => $jobPostPackages,
        ];

        return view("client.home", $data);
    }

    public function about()
    {
        return view("client.about.index");
    }
}
