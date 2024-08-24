<?php

namespace App\Http\Controllers\Client\Employer;

use App\Http\Controllers\Controller;
use App\Repositories\Employer\EmployerInterface;


class EmployerController extends Controller
{
    protected $employerRepository;

    public function __construct(EmployerInterface $employerRepository)
    {
        $this->employerRepository = $employerRepository;
    }

    public function login()
    {
        return view('client.employer.login');
    }

    public function register()
    {
        return view('client.employer.register');
    }


    public function index()
    {
        return view('client.employer.index');
    }

    public function single($slug)
    {
        $employer = $this->employerRepository->getEmployerBySlug($slug);

        return view('client.employer.single', compact('employer'));
    }


}
