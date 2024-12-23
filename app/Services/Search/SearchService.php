<?php

namespace App\Services\Search;

use App\Models\JobPost;

class SearchService
{
    public function searchJobs($filters)
    {
        $query = JobPost::query();

        if (!empty($filters['category']) && $filters['category'] != 0) {
            $query->where('job_category_id', $filters['category']);
        }

        if (!empty($filters['location']) && $filters['location'] != 0) {
            $query->whereHas('employer.address.province', function ($subQuery) use ($filters) {
                $subQuery->where('id', $filters['location']);
            });
        }

        if (!empty($filters['salary']) && $filters['salary'] != 0) {
            $query->where('salary_id', $filters['salary']);
        }

        if (!empty($filters['experience']) && $filters['experience'] != 0) {
            $query->where('experience_id', $filters['experience']);
        }

        // Tìm kiếm theo từ khóa trong title hoặc description
        if (!empty($filters['keyword'])) {
            $query->where(function ($subQuery) use ($filters) {
                $subQuery->where('title', 'LIKE', '%' . $filters['keyword'] . '%')
                    ->orWhere('description', 'LIKE', '%' . $filters['keyword'] . '%')
                    ->orWhereHas('employer', function ($employerQuery) use ($filters) {
                        $employerQuery->where('company_name', 'LIKE', '%' . $filters['keyword'] . '%');
                    });
            });
        }

        $query->where('status', 1);
        $query->orderBy('created_at', 'desc');

        return $query->paginate(12);
    }
}
