<?php

namespace App\Http\Controllers\Client\Page;

use App\Http\Controllers\Controller;
use App\Models\JobPostPackage;
use App\Models\UserJobPackage;

class PricingTableController extends Controller
{

    public function index()
    {
        $packages = JobPostPackage::where('status', 1)->get();

        $userPackages = [];
        if (auth()->check() && auth()->user()->employer) {
            $employerId = auth()->user()->employer->id;
            $userPackages = UserJobPackage::where('employer_id', $employerId)->get();
        }
        $data = [
            'packages' => $packages,
            'userPackages' => collect($userPackages),
        ];
        return view('client.pricing.index', $data);
    }

}
