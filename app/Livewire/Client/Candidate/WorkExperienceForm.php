<?php

namespace App\Livewire\Client\Candidate;

use Livewire\Component;
use App\Models\WorkExperience;

class WorkExperienceForm extends Component
{
    public $experiences = [];
    public $position;
    public $company_name;
    public $start_date;
    public $end_date;
    public $description;

    protected $rules = [
        'position' => 'required',
        'company_name' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after:start_date',
        'description' => 'nullable',
    ];

    public function addExperience()
    {
        $this->validate();

        auth()->user()->candidate->workExperiences()->create([
            'position' => $this->position,
            'company_name' => $this->company_name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'description' => $this->description,
        ]);

        $this->resetForm();
        $this->loadExperiences();
    }

    public function removeExperience($experienceId)
    {
        auth()->user()->candidate->workExperiences()->find($experienceId)->delete();
        $this->loadExperiences();
    }

    public function resetForm()
    {
        $this->position = '';
        $this->company_name = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->description = '';
    }

    public function loadExperiences()
    {
        $this->experiences = auth()->user()->candidate->workExperiences;
    }

    public function mount()
    {
        $this->loadExperiences();
    }

    public function render()
    {
        return view('livewire.client.candidate.work-experience-form');
    }
}
