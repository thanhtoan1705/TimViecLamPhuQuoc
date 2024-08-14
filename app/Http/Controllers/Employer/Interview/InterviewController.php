<?php

namespace App\Http\Controllers\Employer\Interview;

use App\Http\Controllers\Controller;

class InterviewController extends Controller
{
    public function index()
    {
        return view('employer.interview.index');
    }

    public function detail()
    {
        return view('employer.interview.detail');
    }
}
