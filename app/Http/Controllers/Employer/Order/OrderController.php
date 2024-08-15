<?php

namespace App\Http\Controllers\Employer\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('employer.order.index');
    }
}
