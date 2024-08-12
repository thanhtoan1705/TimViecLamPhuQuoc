<?php

namespace App\Http\Controllers\Employer\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index(){
        return view('employer.candidate.index');
    }
}
