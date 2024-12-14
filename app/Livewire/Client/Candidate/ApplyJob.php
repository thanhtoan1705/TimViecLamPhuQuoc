<?php

namespace App\Livewire\Client\Candidate;

use App\Jobs\Client\EmployerNotification;
use App\Repositories\Job\JobRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyJob extends Component
{

    use WithFileUploads;

    public $resume;
    public $description;
    public $jobId;
    public $resumeName;

    protected $rules = [
        'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
        'description' => 'required|string|max:1000',
    ];

    public function updatedResume()
    {
        if ($this->resume) {
            $this->resumeName = $this->resume->getClientOriginalName();
        }
    }

    public function mount($jobId)
    {
        $this->jobId = $jobId;
    }

    public function submit()
    {
        if (!Auth::check() || !Auth::user()->candidate) {
            flash()->warning('Vui lòng đăng nhập tài khoản ứng viên để ứng tuyển.', [], 'Thông báo!');
            return redirect()->to(request()->header('Referer'));
        }

        $candidateId = Auth::user()->candidate->id;

        $this->validate();

        $jobRepository = app(JobRepository::class);
        $lastApplication = $jobRepository->findLastApplication($candidateId, $this->jobId);

        if ($lastApplication && Carbon::parse($lastApplication->created_at)->diffInHours(now()) < 24) {
//            Flasher::error('Bạn đã nộp CV cho bài đăng này. Vui lòng đợi 24 giờ để nộp lại.');
            flash()->error('Bạn đã nộp CV cho bài đăng này. Vui lòng đợi 24 giờ để nộp lại.', [], 'Thất bại!');
            return;
        }

        $originalName = $this->resume->getClientOriginalName();
        $filePath = $this->resume->storeAs('resumes', $originalName, 'public');

        $jobRepository->applyForJob($this->jobId, $candidateId, $filePath, $this->description);

        $job = $jobRepository->findJobById($this->jobId);
        $employer = $job->employer;
        $candidate = Auth::user()->candidate;
        dispatch(new EmployerNotification($employer, $candidate, $job, $filePath))->onConnection('database')->handle();

        $this->reset(['resume', 'description']);

        flash()->success('Đã nộp đơn thành công.', [], 'Thành công!');

        return redirect()->to(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.client.candidate.apply-job');
    }
}
