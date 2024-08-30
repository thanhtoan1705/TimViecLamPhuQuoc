<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Employer\EmployerInterface;
use App\Repositories\JobCategory\JobCategoryInterface;
use App\Repositories\JobPost\JobPostInterface;

class HomeController extends Controller{

    protected $employerRepository;
    protected $jobPostRepository;
    protected $jobCategoryRepository;

    public function __construct(
        EmployerInterface    $employerRepository,
        JobPostInterface     $jobPostRepository,
        JobCategoryInterface $jobCategoryRepository)
    {
        $this->employerRepository = $employerRepository;
        $this->jobPostRepository = $jobPostRepository;
        $this->jobCategoryRepository = $jobCategoryRepository;
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

        $data = [
            'jobpost' => $jobPostRepository,
            'jobCategories' => $jobCategoriesRepository,
            'employers' => $employers,
            'topEmployers' => $topEmployers,
            'hotJobCategories' => $hotJobCategories
        ];

        return view("client.home", $data);
    }

    public function about()
    {
        return view("client.about.index");
    }
}
