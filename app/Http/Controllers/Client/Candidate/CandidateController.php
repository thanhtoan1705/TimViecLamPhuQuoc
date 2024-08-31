<?php

namespace App\Http\Controllers\Client\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Candidate\UpdatePasswordRequest;
use App\Repositories\Candidate\CandidateRepository;
use App\Repositories\Location\LocationInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    protected $candidateRepository;
    protected $locationRepository;

    public function __construct(CandidateRepository $candidateRepository, LocationInterface $locationRepository)
    {
        $this->candidateRepository = $candidateRepository;
        $this->locationRepository = $locationRepository;
    }


    public function index()
    {
        return view("client.cv.index");
    }

    public function detail($id)
    {
        $candidate = $this->candidateRepository->getOneCandidate($id);
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

    public function viewSavedJobs()
    {
        $savedJobs = $this->candidateRepository->getSavedJobs();
        return view('client.candidate.saveJob', compact('savedJobs'));
    }

    public function saveJob(Request $request, $job_id)
    {
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Bạn cần đăng nhập để lưu công việc.');
        }

        $isSaved = $this->candidateRepository->saveJob($job_id);

        if (!$isSaved) {
            return redirect()->back()->with('error', 'Công việc này đã được lưu rồi hoặc không tìm thấy ứng viên.');
        }

        return redirect()->back()->with('success', 'Công việc đã được lưu.');
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

        $this->candidateRepository->updatePassword($user, $request->input('new_password'));

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
