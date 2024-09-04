<?php

namespace App\Http\Controllers\Client\Candidate;

use App\Http\Controllers\Controller;
use App\Repositories\Candidate\CandidateRepository;
use App\Http\Requests\Client\Candidate\UpdatePasswordRequest;
use Illuminate\Support\Facades\Auth;

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




    public function saveJob()
    {
        return view('client.candidate.saveJob');
    }


    public function hot()
    {
        return view("client.candidate.hot");
    }

    public function editPassword()
    {
        return view('client.candidate.change_password');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();

        $this->candidate->updatePassword($user, $request->input('new_password'));

        flash()->success('Cập nhật mật khẩu thành công');

        return redirect()->back();
    }

}
