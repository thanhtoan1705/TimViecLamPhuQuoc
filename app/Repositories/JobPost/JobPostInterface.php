<?php

namespace App\Repositories\JobPost;

interface JobPostInterface
{
    public function getAllJobPost();

    // public function topEmployers();

    public function getApplyCandidatesByJobPost();

    public function unApplyCandidate($jobpostId, $candidateId);

    public function getBestJobs();

    public function getHasteJobs();

    public function topEmployers($limit = 6);

    public function countActiveJobPosts();

    public function countTodayJobPosts();

}
