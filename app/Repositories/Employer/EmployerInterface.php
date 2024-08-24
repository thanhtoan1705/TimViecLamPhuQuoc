<?php

namespace App\Repositories\Employer;

interface EmployerInterface
{
    public function getAllEmployers();

    public function getJobPostsByEmployerSlug($slug, $perPage = 2);
}
