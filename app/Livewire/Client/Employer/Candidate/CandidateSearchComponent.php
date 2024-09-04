<?php

namespace App\Livewire\Client\Employer\Candidate;

use App\Models\Experience;
use App\Models\Major;
use App\Models\Skill;
use App\Repositories\Employer\EmployerInterface;
use Livewire\Component;

class CandidateSearchComponent extends Component
{
    public $candidates;
    public $sortOrder = 'newest';
    public $filters = [];

    public function mount(EmployerInterface $employerRepository)
    {
        $this->filters['majors'] = Major::all();
        $this->filters['skills'] = Skill::all();
        $this->filters['experiences'] = Experience::all();
        $this->sortOrder = 'newest';
        $this->loadCandidates();
    }

    public function updated($propertyName)
    {
        if (strpos($propertyName, 'filters.') === 0) {
            $this->loadCandidates();
        }
    }


    public function loadCandidates()
    {
        $this->candidates = app(EmployerInterface::class)
            ->searchCandidates($this->filters, $this->sortOrder);
    }

    public function render()
    {
        return view('livewire.client.employer.candidate.candidate-search-component');
    }
}
