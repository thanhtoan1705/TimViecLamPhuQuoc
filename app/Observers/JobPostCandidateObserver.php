<?php

namespace App\Observers;

use App\Models\JobPostCandidate;
use App\Notifications\CandidateApplied;


class JobPostCandidateObserver
{
    /**
     * Handle the JobPostCandidate "created" event.
     */
    public function created(JobPostCandidate $jobPostCandidate): void
    {
        $jobPost = $jobPostCandidate->jobPost;
        $candidate = $jobPostCandidate->candidate;

        $employer = $jobPost->employer->user;

        if ($employer) {
            $employer->notify(new CandidateApplied($jobPost, $candidate));
        }

    }

    /**
     * Handle the JobPostCandidate "updated" event.
     */
    public function updated(JobPostCandidate $jobPostCandidate): void
    {
        //
    }

    /**
     * Handle the JobPostCandidate "deleted" event.
     */
    public function deleted(JobPostCandidate $jobPostCandidate): void
    {
        //
    }

    /**
     * Handle the JobPostCandidate "restored" event.
     */
    public function restored(JobPostCandidate $jobPostCandidate): void
    {
        //
    }

    /**
     * Handle the JobPostCandidate "force deleted" event.
     */
    public function forceDeleted(JobPostCandidate $jobPostCandidate): void
    {
        //
    }
}
