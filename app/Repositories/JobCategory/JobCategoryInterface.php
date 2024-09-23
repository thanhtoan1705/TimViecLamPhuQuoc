<?php

namespace App\Repositories\JobCategory;

interface JobCategoryInterface
{
    public function hotJobCategories();

    public function getAllJobCategories();

    public function getAll();

}
