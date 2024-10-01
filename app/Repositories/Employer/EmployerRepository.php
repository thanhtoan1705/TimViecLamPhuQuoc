<?php

namespace App\Repositories\Employer;

use App\Models\Candidate;
use App\Models\Employer;
use App\Models\JobPost;
use App\Models\SaveCandidate;
use Illuminate\Support\Facades\Auth;

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

    public function getAllEmployersPaginate($query, $sortBy, int $perPage)
    {
        if ($sortBy === 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($sortBy === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }

        return $query->paginate($perPage);
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
        $query = Candidate::with(['user', 'major', 'address']);

        // Lọc theo tên hoặc chuyên ngành
        if (isset($filters['search']) && !empty($filters['search'])) {
            $searchTerm = '%' . $filters['search'] . '%'; // Chuẩn bị điều kiện like

            // Tìm kiếm theo tên người dùng hoặc chuyên ngành
            $query->whereHas('user', function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm);
            })->orWhereHas('major', function ($q) use ($searchTerm) {
                $q->where('name', 'like', $searchTerm);
            });
        }

        // Sắp xếp theo thứ tự
        if ($sortOrder === 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        return $query->get();
    }


    public function getSavedCandidatesByEmployer($employerId, $sortOrder = 'newest')
    {
        $query = SaveCandidate::where('employer_id', $employerId);

        if ($sortOrder === 'newest') {
            $query->orderBy('created_at', 'desc');
        } else {
            $query->orderBy('created_at', 'asc');
        }

        return $query->get();
    }

    public function unsaveCandidate($employerId, $candidateId)
    {
        return SaveCandidate::where('employer_id', $employerId)
            ->where('candidate_id', $candidateId)
            ->delete();
    }

    public function saveCandidate($employerId, $candidateId)
    {
        $existingSave = SaveCandidate::where('employer_id', $employerId)
            ->where('candidate_id', $candidateId)
            ->first();

        if (!$existingSave) {
            SaveCandidate::create([
                'employer_id' => $employerId,
                'candidate_id' => $candidateId,
            ]);

            return true;
        }

        return false;
    }


}
