<?php

namespace App\Http\Controllers\Client\Job;

use App\Http\Controllers\Controller;

class JobController extends Controller
{

    public function single()
    {

        return view('client.job.single');
    }
}
