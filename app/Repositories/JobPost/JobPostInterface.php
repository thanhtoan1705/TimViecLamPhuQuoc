<?php

namespace App\Repositories\JobPost;

interface JobPostInterface
{
    public function getAllJobPost();

    public function topEmployers();

    public function getApplyCandidatesByJobPost();

    public function unApplyCandidate($jobpostId, $candidateId);
}
