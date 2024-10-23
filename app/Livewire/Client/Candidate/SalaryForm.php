<?php

namespace App\Livewire\Client\Candidate;

use Livewire\Component;
use App\Models\Salary;

class SalaryForm extends Component
{
    public $candidate;
    public $salaries;
    public $selectedSalary;

    public function mount()
    {
        $this->candidate = auth()->user()->candidate;
        $this->salaries = Salary::all();
        $this->selectedSalary = $this->candidate->salary_id;
    }

    public function updateSalary()
    {
        $this->candidate->update([
            'salary_id' => $this->selectedSalary,
        ]);

        session()->flash('message', 'Mức lương mong muốn đã được cập nhật.');
    }

    public function render()
    {
        return view('livewire.client.candidate.salary-form');
    }
}
