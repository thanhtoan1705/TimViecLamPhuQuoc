<?php

namespace App\Repositories\Employer;

use App\Models\Candidate;
use App\Models\Employer;
use App\Models\JobPost;

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


    public function getEmployerByStatusPaginate(int $status, int $paginate)
    {
        return $this->employer->where('status', $status)
            ->with('addresses.province', 'addresses.district', 'addresses.ward')
            ->paginate($paginate);
    }

    public function getSuggestedCandidatesByEmployer($employerId, $sortOrder = 'newest')
    {
        $jobPosts = JobPost::with(['majors', 'skills'])->where('employer_id', $employerId)->get();

        $majors = $jobPosts->pluck('major_id')->unique();
        $skills = $jobPosts->pluck('skills.*.id')->flatten()->unique();

        $candidates = Candidate::with(['user', 'skills'])
            ->whereIn('major_id', $majors)
            ->orWhereHas('skills', function ($query) use ($skills) {
                $query->whereIn('skills.id', $skills);
            });

        if ($sortOrder === 'oldest') {
            $candidates->orderBy('created_at', 'asc');
        } else {
            $candidates->orderBy('created_at', 'desc');
        }

        return $candidates->get();
    }


    public function getAllCandidates()
    {
        return Candidate::all();
    }

    public function searchCandidates(array $filters, $sortOrder = 'newest')
    {
        $query = Candidate::with(['user', 'skills', 'major', 'address']);

        if (isset($filters['search']) && !empty($filters['search'])) {
            $query->whereHas('user', function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (isset($filters['major']) && !empty($filters['major'])) {
            $query->where('major_id', $filters['major']);
        }

        if (isset($filters['skills']) && is_array($filters['skills'])) {
            $query->whereHas('skills', function ($q) use ($filters) {
                $q->whereIn('id', $filters['skills']);
            });
        }

        if (isset($filters['experience']) && !empty($filters['experience'])) {
            [$minExp, $maxExp] = explode('-', $filters['experience']);
            $query->whereBetween('experience', [(int)$minExp, (int)($maxExp === '+' ? 100 : $maxExp)]);
        }

        if (isset($filters['salary']) && !empty($filters['salary'])) {
            [$salaryMin, $salaryMax] = explode('-', $filters['salary']);
            $query->whereBetween('salary', [(int)$salaryMin, (int)$salaryMax]);
        }

        if ($sortOrder === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        return $query->get();
    }
}
