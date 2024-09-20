<?php

namespace App\Services\Payment;

use App\Models\JobPostPackage;
use App\View\Components\Client\header;

class PaymentService
{
    public function processPayment($paymentMethod, JobPostPackage $package, $employerId, $discount = 0)
    {
        switch ($paymentMethod) {
            case 'Visa':
                return $this->processVisaPayment($package, $employerId, $discount);

            case 'MasterCard':
                return $this->processMasterCardPayment($package, $employerId, $discount);

            case 'PayPal':
                return $this->processPayPalPayment($package, $employerId, $discount);

            case 'VN pay':
                return $this->createVnpTransaction($package, $employerId, $discount);

            case 'Momo':
                return $this->processMomoPayment($package, $employerId, $discount);

            case 'Zalo Pay':
                return $this->processZaloPayPayment($package, $employerId, $discount);

            default:
                return 'Vui lòng chọn một phương thức thanh toán hợp lệ.';
        }
    }

    private function processVisaPayment(JobPostPackage $package, $employerId, $discount)
    {

        return 'Bạn đã chọn thanh toán bằng Visa.';
    }

    private function processMasterCardPayment(JobPostPackage $package, $employerId, $discount)
    {

        return 'Bạn đã chọn thanh toán bằng MasterCard.';
    }

    private function processPayPalPayment(JobPostPackage $package, $employerId, $discount)
    {

        return 'Bạn đã chọn thanh toán bằng PayPal.';
    }

    private function createVnpTransaction(JobPostPackage $package, $employerId, $discount)
    {
        $finalPrice = $package->price - $discount;
//        dd($discount);

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
        $vnp_TmnCode = "K352G5ON";
        $vnp_HashSecret = "F1GCU0VW1JEOZZNDZ80D3C6MHW8N7M8Y";

        $vnp_TxnRef = 'test';
        $vnp_OrderInfo = 'test';
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
        return 'https://sandbox.vnpayment.vn/payment-url';
    }

    private function processMomoPayment(JobPostPackage $package, $employerId, $discount)
    {

        return 'Bạn đã chọn thanh toán bằng Momo.';
    }

    private function processZaloPayPayment(JobPostPackage $package, $employerId, $discount)
    {
        $config = [
            "app_id" => 2553,
            "key1" => "PcY4iZIKFCIdgZvA6ueMcMHHUbRLYjPL",
            "key2" => "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz",
            "endpoint" => "https://sb-openapi.zalopay.vn/v2/create"
        ];

        $embeddata = '{}'; // Merchant's data
        $items = '[]'; // Merchant's data
        $transID = rand(0, 1000000); //Random trans id
        $order = [
            "app_id" => $config["app_id"],
            "app_time" => round(microtime(true) * 1000), // miliseconds
            "app_trans_id" => date("ymd") . "_" . $transID, // translation missing: vi.docs.shared.sample_code.comments.app_trans_id
            "app_user" => "user123",
            "item" => $items,
            "embed_data" => $embeddata,
            "amount" => 10,
            "description" => "Lazada - Payment for the order #$transID",
            "bank_code" => "zalopayapp",
            "callback_url" => "https://zalopay.zalopay.vn/payment/callback",
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

        if ($result['return_code'] == 1){
            header('Location: ' . $result["order_url"]);
            exit;
        }

        foreach ($result as $key => $value) {
            echo "$key: $value<br>";
        }
        return 'Bạn đã chọn thanh toán bằng Zalo Pay.';
    }
}
