<?php

namespace App\Livewire\Client\Candidate;

use Livewire\Component;
use App\Models\LanguageProficiency;

class LanguageProficiencyForm extends Component
{
    public $languages = [];
    public $language;
    public $proficiency_level;

    protected $rules = [
        'language' => 'required',
        'proficiency_level' => 'required',
    ];

    public function addLanguage()
    {
        $this->validate();

        auth()->user()->candidate->languageProficiencies()->create([
            'language' => $this->language,
            'proficiency_level' => $this->proficiency_level,
        ]);

        $this->resetForm();
        $this->loadLanguages();
    }

    public function removeLanguage($languageId)
    {
        auth()->user()->candidate->languageProficiencies()->find($languageId)->delete();
        $this->loadLanguages();
    }

    public function resetForm()
    {
        $this->language = '';
        $this->proficiency_level = '';
    }

    public function loadLanguages()
    {
        $this->languages = auth()->user()->candidate->languageProficiencies;
    }

    public function mount()
    {
        $this->loadLanguages();
    }

    public function render()
    {
        return view('livewire.client.candidate.language-proficiency-form');
    }
}
