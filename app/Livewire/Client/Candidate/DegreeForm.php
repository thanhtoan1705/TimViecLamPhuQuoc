<?php

namespace App\Livewire\Client\Candidate;

use Livewire\Component;
use App\Models\Degree;

class DegreeForm extends Component
{
    public $candidate;
    public $degrees;
    public $selectedDegree;

    public function mount()
    {
        $this->candidate = auth()->user()->candidate;
        $this->degrees = Degree::all();
        $this->selectedDegree = $this->candidate->degree_id;
    }

    public function updateDegree()
    {
        $this->validate([
            'selectedDegree' => 'required|exists:degrees,id',
        ]);

        $this->candidate->update([
            'degree_id' => $this->selectedDegree,
        ]);

        session()->flash('message', 'Bằng cấp đã được cập nhật.');
    }

    public function render()
    {
        return view('livewire.client.candidate.degree-form');
    }
}
