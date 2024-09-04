<?php

namespace App\Filament\Resources\Employer\Candidate\CandidateSearchResource\Pages;

use App\Filament\Resources\Employer\Candidate\CandidateSearchResource;
use Filament\Resources\Pages\Page;

class CandidateSearch extends Page
{
    protected static ?string $navigationLabel = 'Gợi ý ứng viên';
    protected static ?string $modelLabel = 'Gợi ý ứng viên';
    protected static string $resource = CandidateSearchResource::class;
    protected static string $view = 'filament.resources.employer.candidate-resource.pages.candidate-search';


}
