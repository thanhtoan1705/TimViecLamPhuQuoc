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
}
