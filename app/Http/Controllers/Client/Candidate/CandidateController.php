<?php

namespace App\Http\Controllers\Client\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Candidate\UpdatePasswordRequest;
use App\Repositories\Candidate\CandidateRepository;
use App\Repositories\Filter\FilterRepository;
use App\Repositories\Job\JobInterface;
use App\Repositories\Location\LocationInterface;
use App\Services\Filter\FilterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    protected $candidateRepository;
    protected $locationRepository;
    protected FilterService $filterService;
    protected $jobRepository;
    protected $filterRepository;


    public function __construct(
        CandidateRepository $candidateRepository,
        LocationInterface   $locationRepository,
        JobInterface        $jobRepository,
        FilterService       $filterService,
        FilterRepository    $filterRepository
    )
    {
        $this->candidateRepository = $candidateRepository;
        $this->locationRepository = $locationRepository;
        $this->filterService = $filterService;
        $this->jobRepository = $jobRepository;
        $this->filterRepository = $filterRepository;
    }


    public function index()
    {
        return view("client.cv.index");
    }

    public function detail($slug)
    {
        $candidate = $this->candidateRepository->getOneCandidateBySlug($slug);
        $data = ['candidate' => $candidate];
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
        $candidate = auth()->user()->candidate;

        $suggestedJobs = $this->jobRepository->findJobsByMajorAndSkills($candidate);

        $data = [
            'suggestedJobs' => $suggestedJobs,
        ];

        return view("client.candidate.notification", $data);
    }

    public function viewSavedJobs()
    {
        $savedJobs = $this->candidateRepository->getSavedJobs();
        return view('client.candidate.saveJob', compact('savedJobs'));
    }

    public function saveJob(Request $request, $job_id)
    {
        if (!auth()->check()) {
            flash()->error('Bạn cần đăng nhập để lưu công việc.', [], 'Thất bại!');
            return redirect()->back();
        }

        $isSaved = $this->candidateRepository->saveJob($job_id);

        if (!$isSaved) {
            flash()->error('Công việc này đã được lưu rồi hoặc không tìm thấy ứng viên.', [], 'Thất bại!');
            return redirect()->back();
        }

        flash()->success('Công việc đã được lưu.', [], 'Thành công!');
        return redirect()->back();
    }

    public function unsaveJob(Request $request, $job_id)
    {
        if (!auth()->check()) {
            flash()->error('Bạn cần đăng nhập để bỏ lưu công việc.', [], 'Thất bại!');
            return redirect()->back();
        }

        $isUnsaved = $this->candidateRepository->unSaveJob($job_id);

        if (!$isUnsaved) {
            flash()->error('Công việc này chưa được lưu hoặc không tìm thấy ứng viên.', [], 'Thất bại!');
            return redirect()->back();
        }

        flash()->success('Công việc đã được bỏ lưu.', [], 'Thành công!');
        return redirect()->back();
    }


    public function hot(Request $request)
    {
        $selectedSalaries = $request->input('salaries', []);
        $selectedExperiences = $request->input('experiences', []);
        $selectedMajors = $request->input('majors', []);
        $selectedEducations = $request->input('educations', []);
        $selectedLocation = $request->input('locations', null);

        $sortBy = $request->input('sortBy', 'newest');
        $perPage = $request->input('perPage', 12);

        $filteredCandidatesQuery = $this->filterService->filterCandidate(
            $selectedLocation,
            $selectedMajors,
            $selectedExperiences,
            $selectedEducations,
            $selectedSalaries
        );

        $filteredCandidates = $this->candidateRepository->getAllCandidates($filteredCandidatesQuery, $sortBy, $perPage);

        $filteredData = $this->filterRepository->filterCandidate(
            $selectedSalaries,
            $selectedExperiences,
            $selectedMajors,
            $selectedEducations,
            $selectedLocation
        );

        $data = [
            'candidates' => $filteredCandidates,
            'totalCandidates' => $filteredCandidates->total(),
            'perPage' => $perPage,
            'sortBy' => $sortBy,
            'salaries' => $filteredData['salaries'],
            'experiences' => $filteredData['experiences'],
            'majors' => $filteredData['majors'],
            'educations' => $filteredData['educations'],
            'locations' => $filteredData['locations'],
        ];

        return view('client.candidate.hot', $data);
    }


    public function editPassword()
    {
        return view('client.candidate.change_password');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $user = Auth::user();

        $this->candidateRepository->updatePassword($user, $request->input('new_password'));

        flash()->success('Cập nhật mật khẩu thành công.', [],'Thành công!');

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

    public function getCandidateInfo()
    {
        $user = auth()->user();
        $candidate = $user->candidate()->with([
            'major',
            'resume',
            'experience',
            'education',
            'skills',
            'degree',
            'salary',
            'address',
            'workExperiences',
            'educations',
            'languageProficiencies'
        ])->first();

        return response()->json([
            'user' => $user,
            'candidate' => $candidate
        ]);
    }

    public function interviews()
    {
        $interviews = $this->candidateRepository->getInterviews();
        return view('client.candidate.interview', compact('interviews'));
    }
}
