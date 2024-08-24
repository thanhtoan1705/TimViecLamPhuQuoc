<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\JobPost\JobPostInterface;

class HomeController extends Controller{

    protected $jobPostRepository;

    public function __construct(JobPostInterface $jobPostRepository)
    {
        $this->jobPostRepository = $jobPostRepository;
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(){
        $jobPostRepository = $this->jobPostRepository->getAllJobPost();
        $data = [
            'jobpost' => $jobPostRepository
        ];
        return view("client.home", $data);
    }

    public function about()
    {
        return view("client.about.index");
    }
}
