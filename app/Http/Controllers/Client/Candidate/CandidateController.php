<?php

namespace App\Http\Controllers\Client\Candidate;

use App\Http\Controllers\Controller;

class CandidateController extends Controller
{
    public function index()
    {
        return view("client.cv.index");
    }

    public function detail()
    {
        return view('client.candidate.detail');
    }
}
