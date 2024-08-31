<?php

namespace App\View\Components\Client;

use App\Repositories\Candidate\CandidateRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CadidateHeader extends Component
{
    /**
     * Create a new component instance.
     */
    protected $candidate;

    public function __construct(CandidateRepository $candidateRepository)
    {
        // Assuming the CandidateRepository has a method to fetch the candidate by the logged-in user
        $this->candidate = $candidateRepository->getCandidateByUser(Auth::id());
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.cadidate-header', [
            'candidate' => $this->candidate
        ]);
    }
}
