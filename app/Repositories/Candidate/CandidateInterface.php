<?php

namespace App\Repositories\Candidate;

interface CandidateInterface
{
    public function create(array $data);
    public function getOneCandidate($id);
}
