<?php

namespace App\Repositories\Candidate;

use App\Models\User;

interface CandidateInterface
{
    public function create(array $data);
    public function getOneCandidate($id);

    public function getCandidateByUser($userId);

    public function getSavedJobs();

    public function saveJob($job_id);
    public function updatePassword(User $user, string $newPassword);

    public function update($id, array $data);

    public function getAllCandidates($sortBy, $perPage);
}
