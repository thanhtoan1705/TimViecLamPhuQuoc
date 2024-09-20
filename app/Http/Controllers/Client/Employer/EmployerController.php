<?php

namespace App\Http\Controllers\Client\Employer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Employer\RegisterRequest;
use App\Models\JobPostPackage;
use App\Repositories\Employer\EmployerInterface;
use App\Repositories\Promotional\PromotionalRepository;
use App\Repositories\User\UserInterface;
use App\Services\Payment\PaymentService;
use Illuminate\Http\Request;


class EmployerController extends Controller
{
    protected EmployerInterface $employerRepository;
    protected $paymentService;

    public function __construct(EmployerInterface $employerRepository, PaymentService $paymentService)
    {
        $this->employerRepository = $employerRepository;
        $this->paymentService = $paymentService;
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

    public function payment(Request $request, PromotionalRepository $promotionalRepository)
    {
        $employerId = auth()->user()->employer->id;
        $packageId = $request->input('package_id');

        $package = JobPostPackage::find($packageId);
        $availablePromotions = $promotionalRepository->getAvailablePromotions($employerId);

        $data = [
            'package' => $package,
            'availablePromotions' => $availablePromotions,
        ];

        return view('client.employer.payment', $data);
    }

    public function processPayment(Request $request, PromotionalRepository $promotionalRepository)
    {
//        dd($request->input('promo_code'));

        $employerId = auth()->user()->employer->id;
        $packageId = $request->input('package_id');
        $paymentMethod = $request->input('payment_method');

        $package = JobPostPackage::find($packageId);

        $discount = 0;
        if ($request->input('promo_code')) {
            $promo = $promotionalRepository->validatePromo($request->input('promo_code'), $employerId);
            if ($promo) {
                $discount = $promo->discount;
            }
        }

        $response = $this->paymentService->processPayment($paymentMethod, $package, $employerId, $discount);

        // Nếu là VNPay, trả về URL thanh toán
        if ($paymentMethod === 'VNPay' && $response['code'] === '00') {
            return response()->json($response);
        }

        // Xử lý các phương thức thanh toán khác (không phải VNPay)
//        return redirect()->route('client.client.index')->with('message', $response);
    }


    public function single($slug)
    {
        $employer = $this->employerRepository->getEmployerBySlug($slug);

        return view('client.employer.single', compact('employer'));
    }
}
