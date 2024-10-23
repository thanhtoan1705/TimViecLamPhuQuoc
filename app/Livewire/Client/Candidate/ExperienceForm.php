<?php

namespace App\Livewire\Client\Candidate;

use Livewire\Component;
use App\Models\Experience;

class ExperienceForm extends Component
{
    public $candidate;
    public $experiences;
    public $selectedExperience;

    public function mount()
    {
        $this->candidate = auth()->user()->candidate;
        $this->experiences = Experience::all();
        $this->selectedExperience = $this->candidate->experience_id;
    }

    public function updateExperience()
    {
        $this->candidate->update([
            'experience_id' => $this->selectedExperience,
        ]);

        session()->flash('message', 'Kinh nghiệm đã được cập nhật.');
    }

    public function render()
    {
        return view('livewire.client.candidate.experience-form');
    }
}
