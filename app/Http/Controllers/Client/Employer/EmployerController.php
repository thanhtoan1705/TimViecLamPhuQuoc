<?php

namespace App\Http\Controllers\Client\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Employer\RegisterRequest;
use App\Models\JobPostPackage;
use App\Repositories\Employer\EmployerInterface;
use App\Repositories\Promotional\PromotionalInterface;
use App\Repositories\User\UserInterface;
use App\Services\Payment\PaymentService;
use Illuminate\Http\Request;


class EmployerController extends Controller
{
    protected EmployerInterface $employerRepository;

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
        $data = [
            'employers' => $this->employerRepository->getEmployerByStatusPaginate(1, 12),
        ];

        return view('client.employer.index', $data);
    }

    public function single($slug)
    {
        $employer = $this->employerRepository->getEmployerBySlug($slug);

        return view('client.employer.single', compact('employer'));
    }
}
