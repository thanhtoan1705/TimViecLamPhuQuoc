<?php

namespace App\Livewire\Client\Candidate;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Candidate\CandidateRepository;

class Candidate extends Component
{
    use WithPagination;

    public $sortBy = 'newest';
    public $perPage = 10;

    protected $queryString = [
        'sortBy' => ['except' => 'newest'],
        'perPage' => ['except' => 10],
    ];

    public function render(CandidateRepository $candidateRepository)
    {
        $candidates = $candidateRepository->getAllCandidates($this->sortBy, $this->perPage);

        return view('livewire.client.candidate.candidate', [
            'candidates' => $candidates,
        ]);
    }
}
