<?php

namespace App\Http\Controllers\Client\Page;

use App\Http\Controllers\Controller;

class PricingTableController extends Controller
{

    public function index()
    {

        return view('client.pricing.index');
    }

}
