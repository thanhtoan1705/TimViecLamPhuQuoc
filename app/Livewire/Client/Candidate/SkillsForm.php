<?php

namespace App\Livewire\Client\Candidate;

use Livewire\Component;
use App\Models\Skill;

class SkillsForm extends Component
{
    public $skills = [];
    public $newSkill = '';

    public function addSkill()
    {
        if (!empty($this->newSkill)) {
            $skill = Skill::firstOrCreate(['name' => $this->newSkill]);
            auth()->user()->candidate->skills()->attach($skill->id);
            $this->newSkill = '';
            $this->loadSkills();
        }
    }

    public function removeSkill($skillId)
    {
        auth()->user()->candidate->skills()->detach($skillId);
        $this->loadSkills();
    }

    public function loadSkills()
    {
        $this->skills = auth()->user()->candidate->skills;
    }

    public function mount()
    {
        $this->loadSkills();
    }

    public function render()
    {
        return view('livewire.client.candidate.skills-form');
    }
}
