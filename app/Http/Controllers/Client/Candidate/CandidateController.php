<?php

namespace App\Http\Controllers\Client\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Candidate\UpdatePasswordRequest;
use App\Repositories\Candidate\CandidateRepository;
use App\Repositories\Location\LocationInterface;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    protected $candidate;
    protected $locationRepository;

    public function __construct(CandidateRepository $candidate, LocationInterface $locationRepository)
    {
        $this->candidate = $candidate;
        $this->locationRepository = $locationRepository;
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
        $candidate = auth()->user();
        $locations = $this->locationRepository->getAllLocations();
        $candidateLocation = $this->locationRepository->getCandidateLocation($candidate);

        $data = [
            'candidate' => $candidate,
            'locations' => $locations,
            'candidateLocation' => $candidateLocation
        ];

        return view("client.candidate.profile", $data);
    }

    // API để lấy huyện theo tỉnh
    public function getDistricts($provinceId)
    {
        $districts = $this->locationRepository->getDistrictsByProvince($provinceId);
        return response()->json($districts);
    }

    // API để lấy xã/phường theo huyện
    public function getWards($districtId)
    {
        $wards = $this->locationRepository->getWardsByDistrict($districtId);
        return response()->json($wards);
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


    public function header()
    {
        $candidate = auth()->user();

        $data = [
            'candidate' => $candidate,
        ];

        return view('your-view-name', $data);
    }
}
