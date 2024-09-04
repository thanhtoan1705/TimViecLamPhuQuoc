<?php

namespace App\Repositories\Candidate;

use App\Models\Candidate;
use App\Models\User;
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

//    public function getEmployerByStatusPaginate(int $status, int $paginate) {
//        return $this->employer->where('status', $status)
//            ->with('addresses.province', 'addresses.district', 'addresses.ward')
//            ->paginate($paginate);
//    }

    public function updatePassword(User $user, string $newPassword)
    {
        $user->password = Hash::make($newPassword);
        $user->save();
    }

}
