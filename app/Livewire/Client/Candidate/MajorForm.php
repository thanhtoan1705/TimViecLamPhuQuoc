<?php

namespace App\Livewire\Client\Candidate;

use Livewire\Component;
use App\Models\Major;

class MajorForm extends Component
{
    public $candidate;
    public $majors;
    public $selectedMajor;

    public function mount()
    {
        $this->candidate = auth()->user()->candidate;
        $this->majors = Major::all();
        $this->selectedMajor = $this->candidate->major_id;
    }

    public function updateMajor()
    {
        $this->candidate->update([
            'major_id' => $this->selectedMajor,
        ]);

        session()->flash('message', 'Chuyên ngành đã được cập nhật.');
    }

    public function render()
    {
        return view('livewire.client.candidate.major-form');
    }
}
