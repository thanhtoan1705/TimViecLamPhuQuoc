<?php

namespace App\Repositories\Candidate;

use App\Models\User;

interface CandidateInterface
{
    public function create(array $data);
    public function getOneCandidate($id);
    public function updatePassword(User $user, string $newPassword);

    public function update($id, array $data);
}
