<?php

namespace App\Http\Controllers\Client\Page;

use App\Http\Controllers\Controller;
use App\Models\JobPostPackage;

class PricingTableController extends Controller
{

    public function index()
    {
        $packages = JobPostPackage::all();
        $data = [
            'packages' => $packages,
        ];
        return view('client.pricing.index', $data);
    }

}
