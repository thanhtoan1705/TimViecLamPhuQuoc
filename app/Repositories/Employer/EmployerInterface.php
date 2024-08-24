<?php

namespace App\Repositories\Employer;

interface EmployerInterface
{
    public function getAllEmployers();

    public function getJobPostsByEmployerSlug($slug, $perPage = 2);

    public function getEmployerByStatusPaginate(int $status, int $paginate);
}
