<?php

namespace App\Repositories\Candidate;

use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CandidateRepository implements CandidateInterface
{
    protected $candidate;

    public function __construct(Candidate $candidate)
    {
        $this->candidate = $candidate;
    }

    public function create(array $data)
    {
        return $this->candidate->create($data);
    }

    public function getOneCandidate($id)
    {
        // Tìm ứng viên theo ID và lấy các mối quan hệ
        return $this->candidate->where('status', 1)
            ->with(['addresses.province', 'addresses.district', 'addresses.ward',
            ])->findOrFail($id);
    }

    public function getOneCandidateBySlug($slug)
    {
        return $this->candidate->where('slug', $slug)
            ->with(['addresses.province', 'addresses.district', 'addresses.ward'])
            ->firstOrFail();
    }


    public function update($id, array $data)
    {
        $candidate = $this->candidate->findOrFail($id);
        $candidate->update($data);
        return $candidate;
    }


    public function updatePassword($user, string $newPassword)
    {
        $user->password = Hash::make($newPassword);
        $user->save();
    }

    public function getCandidateByUser($userId)
    {
        return $this->candidate->where('user_id', $userId)->with('user', 'addresses.district', 'addresses.province', 'major')->first();
    }

    public function getSavedJobs()
    {
        $user = Auth::user();

        if (!$user || !$user->candidate) {
            return collect(); // Trả về một collection rỗng
        }

        $candidate = $user->candidate;

        return $candidate->savedJobs()->paginate(9);
    }


    public function saveJob($job_id)
    {
        $candidate = Auth::user()->candidate;

        if (!$candidate) {
            return false;
        }

        if ($candidate->savedJobs->contains($job_id)) {
            return false;
        }

        $candidate->savedJobs()->attach($job_id);
        return true;
    }

    public function unSaveJob($job_id)
    {
        $candidate = Auth::user()->candidate;

        if (!$candidate) {
            return false;
        }

        if (!$candidate->savedJobs->contains($job_id)) {
            return false;
        }

        $candidate->savedJobs()->detach($job_id);
        return true;
    }


    public function getAllCandidates($query, $sortBy, $perPage)
    {
        if ($sortBy === 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($sortBy === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }
        return $query->paginate($perPage);
    }

    public function firstOrCreate(array $attributes, array $values = [])
    {
        return Candidate::firstOrCreate($attributes, $values);
    }

    public function findBySlug($slug)
    {
        return Candidate::where('slug', $slug)->first();
    }

    public function updateOrCreate(array $attributes, array $values = [])
    {
        return Candidate::updateOrCreate($attributes, $values);
    }

    public function findByUserId($userId)
    {
        return Candidate::where('user_id', $userId)->first();
    }

    public function getInterviews()
    {
        $candidate = Auth::user()->candidate;

        if (!$candidate) {
            return collect();
        }

        return $candidate->interviews()
            ->with(['job_post', 'employer'])
            ->orderBy('start_time', 'desc')
            ->paginate(9);
    }
}
