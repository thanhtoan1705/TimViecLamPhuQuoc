<?php

namespace App\View\Components\Client;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Province;
use App\Models\Salary;
use App\Models\Experience;
use App\Repositories\JobCategory\JobCategoryInterface;

class Search extends Component
{
    protected $jobCategoryRepository;
    /**
     * Create a new component instance.
     */
    public function __construct(JobCategoryInterface $jobCategoryRepository)
    {
        $this->jobCategoryRepository = $jobCategoryRepository;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $jobCategory = $this->jobCategoryRepository->getAll();

        $province = Province::all();

        $salary = Salary::all();

        $experience = Experience::all();
        
        return view('components.client.search', [
            'jobCategories' => $jobCategory,
            'provinces' => $province,
            'salaries' => $salary,
            'experiences' => $experience
        ]);
    }
}
