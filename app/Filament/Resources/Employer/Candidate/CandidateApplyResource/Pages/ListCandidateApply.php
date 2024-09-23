<?php

namespace App\Filament\Resources\Employer\Candidate\CandidateApplyResource\Pages;

use App\Filament\Resources\Employer\Candidate\CandidateApplyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCandidateApply extends ListRecords
{
    protected static string $resource = CandidateApplyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
