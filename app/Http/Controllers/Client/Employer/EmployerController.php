<?php

namespace App\Http\Controllers\Client\Employer;

use App\Http\Controllers\Controller;
use App\Repositories\Employer\EmployerInterface;
use App\Repositories\Filter\FilterInterface;
use App\Services\Filter\FilterService;
use Illuminate\Http\Request;


class EmployerController extends Controller
{
    protected EmployerInterface $employerRepository;
    protected FilterService $filterService;
    protected FilterInterface $filterRepository;

    public function __construct(
        EmployerInterface $employerRepository,
        FilterService     $filterService,
        FilterInterface   $filterRepository)
    {
        $this->employerRepository = $employerRepository;
        $this->filterService = $filterService;
        $this->filterRepository = $filterRepository;
    }

    public function login()
    {
        return view('client.employer.login');
    }

    public function register()
    {
        return view('client.employer.register');
    }

    public function index(Request $request)
    {
        $selectedCompanyTypes = $request->query('company_types', []);
        $selectedYears = $request->query('years', []);
        $selectedSizes = $request->query('sizes', []);
        $selectedLocation = $request->query('locations', '');
        $sortBy = $request->input('sortBy', 'newest');
        $perPage = $request->input('perPage', 12);

        $filteredEmployers = $this->filterService->filterEmployer(
            $selectedLocation,
            $selectedCompanyTypes,
            $selectedYears,
            $selectedSizes
        );

        $employers = $this->employerRepository->getAllEmployersPaginate($filteredEmployers, $sortBy, $perPage);

        $filteredData = $this->filterRepository->filterEmployer(
            $selectedLocation,
            $selectedCompanyTypes,
            $selectedYears,
            $selectedSizes,
        );
        $data = [
            'sortBy' => $sortBy,
            'perPage' => $perPage,
            'employers' => $employers,
            'locations' => $filteredData['locations'],
            'companyTypes' => $filteredData['companyTypes'],
            'years' => $filteredData['years'],
            'sizes' => $filteredData['sizes'],
        ];

        return view('client.employer.index', $data);
    }

    public function single($slug)
    {
        $employer = $this->employerRepository->getEmployerBySlug($slug);

        return view('client.employer.single', compact('employer'));
    }
}
