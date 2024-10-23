<?php

namespace App\Policies;

use App\Models\JobPostPackage;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPostPackagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_admin::job::post::package::job::post::package');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JobPostPackage $jobPostPackage): bool
    {
        return $user->can('view_admin::job::post::package::job::post::package');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_admin::job::post::package::job::post::package');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobPostPackage $jobPostPackage): bool
    {
        return $user->can('update_admin::job::post::package::job::post::package');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobPostPackage $jobPostPackage): bool
    {
        return $user->can('delete_admin::job::post::package::job::post::package');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_admin::job::post::package::job::post::package');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, JobPostPackage $jobPostPackage): bool
    {
        return $user->can('{{ ForceDelete }}');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, JobPostPackage $jobPostPackage): bool
    {
        return $user->can('{{ Restore }}');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('{{ RestoreAny }}');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, JobPostPackage $jobPostPackage): bool
    {
        return $user->can('{{ Replicate }}');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('{{ Reorder }}');
    }
}
