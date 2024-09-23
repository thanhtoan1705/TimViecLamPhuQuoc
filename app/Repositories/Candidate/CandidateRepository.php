<?php

namespace App\Repositories\Candidate;

use App\Models\Candidate;
use App\Models\User;
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


    public function updatePassword(User $user, string $newPassword)
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
        $candidate = Auth::user()->candidate;

        if (!$candidate) {
            return collect();
        }

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

    public function getAllCandidates($sortBy, $perPage)
    {
        $query = $this->candidate->newQuery();

        if ($sortBy === 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($sortBy === 'oldest') {
            $query->orderBy('created_at', 'asc');
        }
        return $query->paginate($perPage);
    }

}
