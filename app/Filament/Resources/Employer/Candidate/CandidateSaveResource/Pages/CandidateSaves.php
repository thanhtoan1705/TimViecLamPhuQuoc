<?php

namespace App\Filament\Resources\Employer\Candidate\CandidateSaveResource\Pages;

use App\Filament\Resources\Employer\Candidate\CandidateSaveResource;
use App\Repositories\Employer\EmployerInterface;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms\Components\Select;
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
        app(EmployerInterface::class)->unsaveCandidate($employerId, $candidateId);
        flash('message', 'Ứng viên đã được gỡ khỏi danh sách lưu.');
    }

}
