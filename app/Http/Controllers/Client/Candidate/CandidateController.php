<?php

namespace App\Http\Controllers\Client\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        return view("client.cv.index");
    }
}
