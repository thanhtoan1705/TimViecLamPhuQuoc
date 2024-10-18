<?php

namespace App\Filament\Resources\Employer\Candidate\CandidateResource\Pages;

use App\Filament\Resources\Employer\Candidate\CandidateResource;
use App\Repositories\Employer\EmployerInterface;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;

class CandidateSuggestion extends Page
{
    protected static ?string $navigationLabel = 'Gợi ý ứng viên';

    protected static ?string $modelLabel = 'Gợi ý ứng viên';

    protected static string $resource = CandidateResource::class;
    protected static string $view = 'filament.resources.employer.candidate-resource.pages.candidate-suggestion';

    public $candidates;
    public $sortOrder = 'newest';

    public function getTitle(): string
    {
        return __('Gợi ý ứng viên');
    }

    public function getHeading(): string
    {
        return __('Gợi ý ứng viên');
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
                ->afterStateUpdated(fn($state) => $this->loadCandidates()),
        ];
    }


    public function mount(EmployerInterface $employerRepository)
    {
        $this->sortOrder = 'newest';
        $this->loadCandidates();
    }

    protected function loadCandidates()
    {
        $employerId = Auth::user()->employer->id;
        $this->candidates = app(EmployerInterface::class)
            ->getSuggestedCandidatesByEmployer($employerId, $this->sortOrder);
    }

    public function saveCandidate($candidateId)
    {
        $employerId = Auth::user()->employer->id;

        $isSaved = app(EmployerInterface::class)->saveCandidate($employerId, $candidateId);

        if ($isSaved) {
            Notification::make()
                ->title('Ứng viên đã được lưu')
                ->success()
                ->send();
        } else {
            Notification::make()
                ->title('Ứng viên đã được lưu trước đó')
                ->warning()
                ->send();
        }
    }



}
