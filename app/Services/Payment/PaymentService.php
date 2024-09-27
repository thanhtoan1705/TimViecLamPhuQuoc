<?php

namespace App\Services\Payment;

use App\Models\JobPostPackage;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Promotion;
use App\Models\Transaction;
use App\Models\TransactionLog;
use App\View\Components\Client\header;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentService
{
    public function processPayment($paymentMethod, JobPostPackage $package, $employerId, $promo)
    {
        switch ($paymentMethod) {
            case 'Visa':
                return $this->processVisaPayment($package, $employerId, $promo);

            case 'MasterCard':
                return $this->processMasterCardPayment($package, $employerId, $promo);

            case 'PayPal':
                return $this->processPayPalPayment($package, $employerId, $promo);

            case 'VN pay':
                return $this->createVnpTransaction($package, $employerId, $promo);

            case 'Momo':
                return $this->processMomoPayment($package, $employerId, $promo);

            case 'Zalo Pay':
                return $this->processZaloPayPayment($package, $employerId, $promo);

            default:
                return 'Vui lòng chọn một phương thức thanh toán hợp lệ.';
        }
    }

    private function processVisaPayment(JobPostPackage $package, $employerId, $promo)
    {
        return redirect()->route('client.client.index');
    }

    private function processMasterCardPayment(JobPostPackage $package, $employerId, $promo)
    {
        return redirect()->route('client.client.index');
    }

    private function processPayPalPayment(JobPostPackage $package, $employerId, $promo)
    {
        $finalPrice = $package->price;

        if ($promo) {
            $finalPrice = $package->price - $promo->discount;
        }
        $exchangeRate = 23000;
        $finalPriceUSD = number_format($finalPrice / $exchangeRate, 2, '.', '');

        $paypal = new PayPalClient();
        $paypal->setApiCredentials(config('paypal'));
        $token = $paypal->getAccessToken();
        $paypal->setAccessToken($token);

        $order = $paypal->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "100"
                    ]
                ]
            ],
            "application_context" => [
                "return_url" => route('client.employer.paypal.callback', [
                    'employer_id' => $employerId,
                    'package_id' => $package->id,
                    'promo_id' => $promo ? $promo->id : null
                ]),
            ]
        ]);

        header('Location: ' . $order['links'][1]['href']);
        die();
    }

    private function createVnpTransaction(JobPostPackage $package, $employerId, $promo)
    {
        $finalPrice = $package->price;

        if ($promo) {
            $finalPrice = $package->price - $promo->discount;
        }

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('client.employer.vnpay.callback', [
            'employer_id' => $employerId,
            'package_id' => $package->id,
            'promo_id' => $promo ? $promo->id : null
        ]);
        $vnp_TmnCode = "K352G5ON";
        $vnp_HashSecret = "F1GCU0VW1JEOZZNDZ80D3C6MHW8N7M8Y";

        $vnp_TxnRef = 'TXN' . time() . '_' . $employerId . '_' . $package->id . '_' . ($promo ? $promo->id : 0);
        $vnp_OrderInfo = "Thanh toán gói " . $package->name . " cho nhà tuyển dụng #" . $employerId;
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $finalPrice * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }

        return $vnp_Url;
    }

    private function processMomoPayment(JobPostPackage $package, $employerId, $promo)
    {
        $finalPrice = $package->price;

        if ($promo) {
            $finalPrice = $package->price - $promo->discount;
        }

        $endpoint = config('momo.endpoint');
        $partnerCode = config('momo.partnerCode');
        $accessKey = config('momo.accessKey');
        $secretKey = config('momo.secretKey');

        $orderInfo = "Thanh toán qua MoMo";
        $orderId = time() . "";
        $redirectUrl = route('client.employer.momo.callback');
        $ipnUrl = route('client.employer.momo.callback');
        $serectkey = $secretKey;
        $orderInfo = "Thanh toán gói " . $package->name . " cho nhà tuyển dụng #" . $employerId;
        $amount = $finalPrice;

        $requestId = time() . "";
        $requestType = "captureWallet";

        $extraData = json_encode([
            'employer_id' => $employerId,
            'package_id' => $package->id,
            'promo_id' => $promo ? $promo->id : null
        ]);

        $rawHash = "accessKey=" . $accessKey
            . "&amount=" . $amount
            . "&extraData=" . $extraData
            . "&ipnUrl=" . $ipnUrl
            . "&orderId=" . $orderId
            . "&orderInfo=" . $orderInfo
            . "&partnerCode=" . $partnerCode
            . "&redirectUrl=" . $redirectUrl
            . "&requestId=" . $requestId
            . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);

        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);

        if (isset($jsonResult['payUrl'])) {
            // Chuyển hướng đến trang thanh toán MoMo
            header('Location: ' . $jsonResult['payUrl']);
            exit;
        } else {
            dd('Lỗi: Không tìm thấy URL thanh toán MoMo.', $jsonResult);
        }
//        header('Location: ' . $jsonResult['payUrl']);
        exit;
    }

    private function processZaloPayPayment(JobPostPackage $package, $employerId, $promo)
    {
        $finalPrice = $package->price;

        if ($promo) {
            $finalPrice = $package->price - $promo->discount;
        }

        $config = [
            "app_id" => 2553,
            "key1" => "PcY4iZIKFCIdgZvA6ueMcMHHUbRLYjPL",
            "key2" => "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz",
            "endpoint" => "https://sb-openapi.zalopay.vn/v2/create"
        ];

        $embeddata = '{}';
        $items = '[]';
        $transID = rand(0, 1000000);

        $order = [
            "app_id" => $config["app_id"],
            "app_time" => round(microtime(true) * 1000), // miliseconds
            "app_trans_id" => date("ymd") . "_" . $transID, // translation missing: vi.docs.shared.sample_code.comments.app_trans_id
            "app_user" => "user_" . $employerId,
            "item" => $items,
            "embed_data" => $embeddata,
            "amount" => $finalPrice,
            "description" => "Thanh toán gói " . $package->name . " cho nhà tuyển dụng #" . $employerId,
            "bank_code" => "zalopayapp",
            "callback_url" => route('client.employer.zalopay.callback', [
                'employer_id' => $employerId,
                'package_id' => $package->id,
                'promo_id' => $promo ? $promo->id : null,
            ]),
        ];

        $data = $order["app_id"] . "|" . $order["app_trans_id"] . "|" . $order["app_user"] . "|" . $order["amount"]
            . "|" . $order["app_time"] . "|" . $order["embed_data"] . "|" . $order["item"];
        $order["mac"] = hash_hmac("sha256", $data, $config["key1"]);

        $context = stream_context_create([
            "http" => [
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => "POST",
                "content" => http_build_query($order)
            ]
        ]);

        $resp = file_get_contents($config["endpoint"], false, $context);
        $result = json_decode($resp, true);

        if ($result['return_code'] == 1) {
            header('Location: ' . $result["order_url"]);
            exit;
        }

        foreach ($result as $key => $value) {
            echo "$key: $value<br>";
        }
        return 'Bạn đã chọn thanh toán bằng Zalo Pay.';
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function savePayment($employerId, $package, $paymentMethod, $vnp_ResponseCode, $promo, $trans_id = null)
    {
        $finalPrice = $package->price;

        if ($promo) {
            $finalPrice = $package->price - $promo->discount;
        }

        if ($trans_id) {
            $transaction = Transaction::where('trans_id', $trans_id)->first();
        } else {
            // Tạo mới transaction cho VNPay hoặc các phương thức không có transaction_id
            $transaction = Transaction::create([
                'employer_id' => $employerId,
                'merchant_id' => 1,
                'amount' => $finalPrice,
                'transaction_type' => 'payment',
                'status' => 'successful',
            ]);
        }

        if ($promo) {
            $promotion = Promotion::find($promo->id);
            if ($promotion) {
                $promotion->number_use = max(0, $promotion->number_use - 1);
                $promotion->save();
            }
        }

        // Lưu thông tin vào bảng TransactionLog
        TransactionLog::create([
            'transaction_id' => $transaction->id,
            'event' => 'Payment processed with ' . $paymentMethod,
        ]);

        // Lưu hoặc cập nhật phương thức thanh toán
        PaymentMethod::create([
            'employer_id' => $employerId,
            'method_type' => $paymentMethod,
            'details' => 'Some details about the payment method',
        ]);

        $paymentMethodId = PaymentMethod::where('method_type', $paymentMethod)->first()->id;

        $payment = Payment::create([
            'employer_id' => $employerId,
            'packages_id' => $package->id,
            'promotion_id' => $promo ? $promo->id : null,
            'amount' => $finalPrice,
            'payment_date' => now(),
            'expiration_date' => now()->addDays(30),
            'payment_method_id' => $paymentMethodId,
            'transaction_id' => $transaction->id,
        ]);
    }
}
