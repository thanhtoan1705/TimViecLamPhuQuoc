<?php

namespace App\Livewire\Client\Employer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Employer\EmployerInterface;

class JobPosts extends Component
{
    use WithPagination;

    public $employer;

    protected $repository;

    public function boot(EmployerInterface $repository)
    {
        $this->repository = $repository;
    }

    public function mount($employer)
    {
        $this->employer = $employer;
    }

    public function render(EmployerInterface $repository)
    {
        $jobPosts = $repository->getJobPostsByEmployerSlug($this->employer->slug, 2);

        $data = [
            'jobPosts' => $jobPosts,
        ];

        return view('livewire.client.employer.job-posts', $data);
    }
}

