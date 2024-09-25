<?php

namespace App\Observers;

use App\Models\JobPostCandidate;
use App\Models\User;
use App\Notifications\CandidateApplied;
use App\Notifications\EmployerViewedProfileNotification;
use Filament\Notifications\Notification;


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
//        if ($employer) {
//            $employer->notify(new CandidateApplied($jobPost, $candidate));
//        }
        Notification::make()
            ->title("Ứng viên " . $candidate->user->name . " đã nộp CV cho vị trí " . $jobPost->title . " tại công ty của bạn.")
            ->sendToDatabase($employer)
            ->success();

    }

    /**
     * Handle the JobPostCandidate "updated" event.
     */
    public function updated(JobPostCandidate $jobPostCandidate): void
    {
        if ($jobPostCandidate->isDirty('viewed') && $jobPostCandidate->viewed == true) {
            $candidate = $jobPostCandidate->candidate;
            $candidate->user->notify(new EmployerViewedProfileNotification($jobPostCandidate->jobPost));
        }
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
