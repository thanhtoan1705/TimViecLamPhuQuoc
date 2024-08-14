<?php

namespace App\Http\Controllers\Employer\Voucher;

use App\Http\Controllers\Controller;

class VoucherController extends Controller
{
    public function promotion()
    {
        return view('employer.voucher.promotion');
    }
}
