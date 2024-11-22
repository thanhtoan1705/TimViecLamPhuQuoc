<?php
    return [
        'vnp_url' => env('VNP_URL', 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html'),
        'vnp_tmncode' => env('VNP_TMNCODE', 'default_tmn_code'),
        'vnp_hashsecret' => env('VNP_HASHSECRET', 'default_hash_secret'),
    ];
