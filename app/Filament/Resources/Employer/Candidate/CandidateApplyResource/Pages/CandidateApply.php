<?php

namespace App\Filament\Resources\Employer\Candidate\CandidateApplyResource\Pages;

use App\Filament\Resources\Employer\Candidate\CandidateApplyResource;
use App\Repositories\JobPost\JobPostInterface;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Filament\Notifications\Notification;

class CandidateApply extends Page
{
    protected static ?string $navigationLabel = 'Ứng viên đã lưu';

    protected static ?string $modelLabel = 'Ứng viên đã lưu';

    protected static string $resource = CandidateApplyResource::class;
    protected static string $view = 'filament.resources.employer.candidate-resource.pages.candidate-apply';

    public $applyCandidates;
    public $sortOrder = 'newest';
    public $selectedJobPostId = null;

    protected function getFormSchema(): array
    {
        return [
            Select::make('sortOrder')
                ->label('Sắp xếp')
                ->options([
                    'newest' => 'Mới nhất',
                    'oldest' => 'Cũ nhất',
                ])
                ->default('newest')
                ->reactive()
                ->afterStateUpdated(fn($state) => $this->loadApplyCandidates($this->selectedJobPostId, $state)),

            Select::make('selectedJobPostId')
                ->label('Chọn Job Post')
                ->options(
                    \App\Models\JobPost::where('employer_id', Auth::user()->employer->id)
                        ->pluck('title', 'id')
                )
                ->default(null)
                ->reactive()
                ->afterStateUpdated(fn($state) => $this->loadApplyCandidates($state, $this->sortOrder)),
        ];
    }

    public function mount(JobPostInterface $jobPostRepository)
    {
        $this->sortOrder = 'newest';
        $this->loadApplyCandidates();
    }

    protected function loadApplyCandidates($jobPostId = null, $sortOrder = 'newest')
    {
        $jobPostRepository = app(JobPostInterface::class);

        $this->applyCandidates = $jobPostRepository->getApplyCandidatesByJobPost($jobPostId, $sortOrder);
    }

    public function unApplyCandidate($jobpostId, $candidateId)
    {
        $result = app(JobPostInterface::class)->unApplyCandidate($jobpostId, $candidateId);
        if ($result) {
            $this->loadApplyCandidates($this->selectedJobPostId, $this->sortOrder);
            Notification::make()
                ->title('Thành công')
                ->body('Ứng viên đã được gỡ khỏi danh sách ứng tuyển.')
                ->success()
                ->send();
        } else {
            Notification::make()
                ->title('Lỗi')
                ->body('Không thể gỡ ứng viên đã được gỡ khỏi danh sách ứng tuyển. Vui lòng thử lại.')
                ->danger()
                ->send();
        }
    }
}
