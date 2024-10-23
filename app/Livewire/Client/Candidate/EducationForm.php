<?php

namespace App\Livewire\Client\Candidate;

use Livewire\Component;
use App\Models\Education;

class EducationForm extends Component
{
    public $educations = [];
    public $major_name;
    public $institution_name;
    public $start_date;
    public $end_date;
    public $classification;
    public $gpa;

    protected $rules = [
        'major_name' => 'required',
        'institution_name' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'nullable|date|after:start_date',
        'classification' => 'nullable',
        'gpa' => 'nullable|numeric|between:0,4',
    ];

    public function addEducation()
    {
        $this->validate();

        auth()->user()->candidate->educations()->create([
            'major_name' => $this->major_name,
            'institution_name' => $this->institution_name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'classification' => $this->classification,
            'gpa' => $this->gpa,
        ]);

        $this->resetForm();
        $this->loadEducations();
    }

    public function removeEducation($educationId)
    {
        auth()->user()->candidate->educations()->find($educationId)->delete();
        $this->loadEducations();
    }

    public function resetForm()
    {
        $this->major_name = '';
        $this->institution_name = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->classification = '';
        $this->gpa = '';
    }

    public function loadEducations()
    {
        $this->educations = auth()->user()->candidate->educations;
    }

    public function mount()
    {
        $this->loadEducations();
    }

    public function render()
    {
        return view('livewire.client.candidate.education-form');
    }
}
