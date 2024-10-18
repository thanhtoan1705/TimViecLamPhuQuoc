<?php

namespace App\Filament\Resources\Employer\Candidate\CandidateSaveResource\Pages;

use App\Filament\Resources\Employer\Candidate\CandidateSaveResource;
use App\Repositories\Employer\EmployerInterface;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;

class CandidateSaves extends Page
{
    protected static ?string $navigationLabel = 'Ứng viên đã lưu';

    protected static ?string $modelLabel = 'Ứng viên đã lưu';

    protected static string $resource = CandidateSaveResource::class;
    protected static string $view = 'filament.resources.employer.candidate-resource.pages.candidate-save';

    public $savedCandidates;
    public $sortOrder = 'newest';

    public function getTitle(): string
    {
        return __('Ứng viên đã lưu');
    }

    public function getHeading(): string
    {
        return __('Ứng viên đã lưu');
    }
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
                ->afterStateUpdated(fn($state) => $this->loadSavedCandidates()),
        ];
    }

    public function mount(EmployerInterface $employerRepository)
    {
        $this->sortOrder = 'newest';
        $this->loadSavedCandidates();
    }

    protected function loadSavedCandidates()
    {
        $employerId = Auth::user()->employer->id;
        $this->savedCandidates = app(EmployerInterface::class)
            ->getSavedCandidatesByEmployer($employerId, $this->sortOrder);
    }

    public function unsaveCandidate($candidateId)
    {
        $employerId = Auth::user()->employer->id;
        $result = app(EmployerInterface::class)->unsaveCandidate($employerId, $candidateId);

        if ($result) {
            Notification::make()
                ->title('Ứng viên đã được gỡ khỏi danh sách lưu')
                ->success()
                ->send();

            // Cập nhật lại danh sách ứng viên đã lưu
            $this->loadSavedCandidates();
        } else {
            Notification::make()
                ->title('Có lỗi xảy ra khi gỡ ứng viên')
                ->danger()
                ->send();
        }
    }

}
