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

    public function unSaveJob($job_id);

    public function updatePassword(User $user, string $newPassword);

    public function update($id, array $data);

    public function getAllCandidates($query, $sortBy, $perPage);

    public function firstOrCreate(array $attributes, array $values = []);
    public function findBySlug($slug);

    public function findByUserId($userId);

    public function getInterviews();
}
