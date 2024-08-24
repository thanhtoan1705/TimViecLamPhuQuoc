<?php

namespace App\Repositories\Employer;

use App\Models\Employer;

class EmployerRepository implements EmployerInterface
{
    protected $employer;

    public function __construct(Employer $employer)
    {
        $this->employer = $employer;
    }

    public function getAllEmployers($limit = 10)
    {
        return $this->employer::with(['user', 'address'])
            ->latest('id')
            ->take($limit)
            ->get();
    }

    public function getEmployerBySlug($slug)
    {
        return $this->employer::where('slug', $slug)
            ->with(['user', 'address'])
            ->firstOrFail();
    }

    public function getJobPostsByEmployerSlug($slug, $perPage = 2)
    {
        $employer = $this->employer->where('slug', $slug)->firstOrFail();

        return $employer->jobPosts()
            ->latest('id')
            ->paginate($perPage);
    }



}
