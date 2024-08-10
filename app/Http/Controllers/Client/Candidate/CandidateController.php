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

    public function profile()
    {
        return view("client.candidate.profile");
    }

    public function watched()
    {
        return view("client.candidate.watched");
    }

    public function notification()
    {
        return view("client.candidate.notification");
    }


    public function login()
    {
        return view('client.candidate.login');
    }

    public function register()
    {
        return view('client.candidate.register');
    }

    public function saveJob()
    {
        return view('client.candidate.saveJob');
    }
}
