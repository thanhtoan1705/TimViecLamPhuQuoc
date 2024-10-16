<?php

namespace App\Repositories\CV;

interface CVInterface
{
    public function getAllTemplates($perPage, $sortBy);
}
