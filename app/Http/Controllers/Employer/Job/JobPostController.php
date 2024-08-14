<?php

namespace App\Http\Controllers\Employer\Job;

use App\Http\Controllers\Controller;

class JobPostController extends Controller
{

    public function create()
    {

        return view('employer.job.create');
    }
}
