<?php

namespace App\Repositories\CV;

use App\Models\CvTemplate;

class CVRepository implements CVInterface
{
    protected $cv;

    public function __construct(CvTemplate $cv)
    {
        $this->cv = $cv;
    }

    public function getAllTemplates($perPage, $sortBy)
    {
        $query = $this->cv->query();

        if ($sortBy == 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($sortBy == 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        return $query->select('id', 'template_name', 'template_description', 'template_image', 'template_content')
            ->paginate($perPage);
    }
}
