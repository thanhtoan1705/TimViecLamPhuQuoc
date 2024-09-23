<?php

namespace App\Filament\Resources\Employer\Candidate\CandidateApplyResource\Pages;

use App\Filament\Resources\Employer\Candidate\CandidateApplyResource;
use App\Models\JobPostCandidate;
use Filament\Resources\Pages\Page;

class CandidateDetail extends Page
{
    protected static ?string $navigationLabel = 'Chi tiết ứng viên';

    protected static ?string $modelLabel = 'Chi tiết ứng viên';

    protected static string $resource = CandidateApplyResource::class;
    protected static string $view = 'filament.resources.employer.candidate-resource.pages.candidate-detail';

    public $record;

    public function mount(JobPostCandidate $record): void
    {
        $record->update(['viewed' => true]);
    }




}
