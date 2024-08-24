<?php

namespace App\Http\Controllers\Client\Candidate;

use App\Http\Controllers\Controller;
use App\Repositories\Candidate\CandidateRepository;

class CandidateController extends Controller
{
    protected $candidate;

    public function __construct(CandidateRepository $candidate)
    {
        $this->candidate = $candidate;
    }

    public function index()
    {
        return view("client.cv.index");
    }

    public function detail($id)
    {
        $candidate = $this->candidate->getOneCandidate($id);
        $data = [
            'candidate' => $candidate
        ];
        return view('client.candidate.detail', $data);
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


    public function hot()
    {
        return view("client.candidate.hot");
    }
}
