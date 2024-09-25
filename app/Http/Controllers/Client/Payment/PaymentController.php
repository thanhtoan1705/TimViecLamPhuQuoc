<?php

namespace App\Http\Controllers\Client\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Employer\RegisterRequest;
use App\Models\JobPostPackage;
use App\Models\Payment;
use App\Models\Promotion;
use App\Models\Transaction;
use App\Repositories\Employer\EmployerInterface;
use App\Repositories\Promotional\PromotionalInterface;
use App\Repositories\User\UserInterface;
use App\Services\Payment\PaymentService;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PaymentController extends Controller
{
    protected EmployerInterface $employerRepository;
    protected $paymentService;
    protected PromotionalInterface $promotionalRepository;

    public function __construct(
        EmployerInterface    $employerRepository,
        PaymentService       $paymentService,
        PromotionalInterface $promotionalRepository)
    {
        $this->employerRepository = $employerRepository;
        $this->paymentService = $paymentService;
        $this->promotionalRepository = $promotionalRepository;
    }

    public function payment(Request $request)
    {
        $employerId = auth()->user()->employer->id;
        $packageId = $request->input('package_id');

        $package = JobPostPackage::find($packageId);
        $availablePromotions = $this->promotionalRepository->getAvailablePromotions($employerId);

        $data = [
            'package' => $package,
            'availablePromotions' => $availablePromotions,
        ];

        return view('client.employer.payment', $data);
    }

    public function processPayment(Request $request)
    {
        $employerId = auth()->user()->employer->id;
        $packageId = $request->input('package_id');
        $paymentMethod = $request->input('payment_method');

        $package = JobPostPackage::find($packageId);

        $promoCode = $request->input('promo_code');
        $promo = Promotion::whereRaw('LOWER(code) = ?', [strtolower($promoCode)])->first();

        if ($request->input('promo_code')) {
            $promo = $this->promotionalRepository->validatePromo($promoCode, $employerId);
        }

        $response = $this->paymentService->processPayment($paymentMethod, $package, $employerId, $promo);
    }

    public function handlePaypalCallback(Request $request)
    {
        $employerId = $request->get('employer_id');
        $packageId = $request->get('package_id');
        $promoId = $request->get('promo_id');

        $package = JobPostPackage::find($packageId);
        $promo = $promoId ? Promotion::find($promoId) : null;

        $this->paymentService->savePayment($employerId, $package, 'Paypal', '00', $promo, null);

        $paypal = new PayPalClient();
        $paypal->setApiCredentials(config('paypal'));
        $token = $paypal->getAccessToken();
        $paypal->setAccessToken($token);

        $paypal->capturePaymentOrder($request->token);

        return redirect()->route('client.client.index')->with('message', 'Thanh toán thành công!');
    }

    public function handleVnPayCallback(Request $request)
    {
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');

        $vnp_TxnRef = $request->input('vnp_TxnRef');
        $parts = explode('_', $vnp_TxnRef);
        $employerId = $parts[1];
        $packageId = $parts[2];
        $promoId = $parts[3] == 0 ? null : $parts[3];

        $package = JobPostPackage::find($packageId);
        $promo = $promoId ? Promotion::find($promoId) : null;

        if ($vnp_ResponseCode === '00') {

            $transaction = null;
            $this->paymentService->savePayment($employerId, $package, 'VNPay', '00', $promo, $transaction);
            return redirect()->route('client.client.index')->with('message', 'Thanh toán thành công!');
        } else {
            return redirect()->route('client.client.index')->with('message', 'Thanh toán không thành công!');
        }
    }

    public function handleZaloPayCallback(Request $request)
    {
        $employerId = $request->get('employer_id');
        $packageId = $request->get('package_id');
        $promoId = $request->get('promo_id');

        $package = JobPostPackage::find($packageId);
        $promo = $promoId ? Promotion::find($promoId) : null;

        $config = [
            "app_id" => 2553,
            "key1" => "PcY4iZIKFCIdgZvA6ueMcMHHUbRLYjPL",
            "key2" => "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz"
        ];

        // Lấy dữ liệu từ request của ZaloPay
        $data = $request->all();
//        dd($data);

        // Tạo chuỗi dữ liệu để xác thực MAC
        $receivedMac = $data['mac'];
        $stringToHash = $data['app_id'] . '|' . $data['app_trans_id'] . '|' . $data['app_time'] . '|' . $data['zp_trans_id'] . '|' . $data['server_time'] . '|' . $data['amount'] . '|' . $data['channel'] . '|' . $data['status'];
        $calculatedMac = hash_hmac('sha256', $stringToHash, $config['key2']);

        // Kiểm tra MAC hợp lệ
        if ($receivedMac === $calculatedMac) {
            // Nếu MAC hợp lệ, xử lý giao dịch
            if ($data['status'] == 1) { // Status 1 nghĩa là giao dịch thành công
                // Tìm giao dịch theo app_trans_id
                $transaction = Transaction::where('transaction_id', $data['app_trans_id'])->first();

                if ($transaction) {
                    // Cập nhật trạng thái giao dịch và các bảng liên quan
                    $transaction->update(['status' => 'successful']);
                    $this->paymentService->savePayment($employerId, $package, 'Momo', '00', $promo, null);
                    // Cập nhật trạng thái trong bảng Payment nếu cần
                    Payment::where('transaction_id', $transaction->transaction_id)
                        ->update(['status' => 'successful', 'payment_date' => now()]);

                    // Trả về phản hồi thành công cho ZaloPay
                    return response()->json([
                        'return_code' => 1,
                        'return_message' => 'Giao dịch thành công'
                    ]);
                } else {
                    // Nếu không tìm thấy giao dịch
                    return response()->json([
                        'return_code' => 2,
                        'return_message' => 'Không tìm thấy giao dịch'
                    ]);
                }
            } else {
                // Giao dịch thất bại, cập nhật trạng thái thất bại trong DB
                Transaction::where('transaction_id', $data['app_trans_id'])
                    ->update(['status' => 'failed']);

                return response()->json([
                    'return_code' => 2,
                    'return_message' => 'Giao dịch thất bại'
                ]);
            }
        } else {
            // MAC không hợp lệ
            return response()->json([
                'return_code' => 2,
                'return_message' => 'Dữ liệu không hợp lệ'
            ]);
        }
    }

    public function handleMomoCallback(Request $request)
    {

        // Giải mã extraData
        $extraData = json_decode($request->extraData, true);

        // Lấy các giá trị từ extraData
        $employerId = $extraData['employer_id'] ?? null;
        $packageId = $extraData['package_id'] ?? null;
        $promoId = $extraData['promo_id'] ?? null;

        $package = JobPostPackage::find($packageId);
        $promo = $promoId ? Promotion::find($promoId) : null;

        if ($request->resultCode === '0') {
            $transaction = new Transaction();
            $transaction->employer_id = $employerId;
            $transaction->merchant_id = 1;
            $transaction->transaction_type = 'payment';
            $transaction->trans_id = $request->transId;
            $transaction->amount = $request->amount;
            $transaction->status = 'success';
            $transaction->save();

            $this->paymentService->savePayment($employerId, $package, 'Momo', '00', $promo, $transaction->trans_id);
            return redirect()->route('client.client.index')->with('message', 'Thanh toán thành công!');
        } else {
            return redirect()->route('client.client.index')->with('message', 'Thanh toán không thành công!');
        }
    }
}
