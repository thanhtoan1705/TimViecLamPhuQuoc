<?php

namespace App\Policies;

use App\Models\JobPost;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Traits\HasRoles;

class JobPostPolicy
{
    use HandlesAuthorization, HasRoles;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_admin::job::post::job::post');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JobPost $jobPost): bool
    {
        return $user->can('view_admin::job::post::job::post');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_admin::job::post::job::post');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobPost $jobPost): bool
    {
        return $user->can('update_admin::job::post::job::post');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobPost $jobPost): bool
    {
        return $user->can('delete_admin::job::post::job::post');
    }

    /**
     * Determine whether the user can bulk delete.
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_admin::job::post::job::post');
    }

    /**
     * Determine whether the user can permanently delete.
     */
    public function forceDelete(User $user, JobPost $jobPost): bool
    {
        return $user->can('force_delete_admin::job::post::job::post');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_admin::job::post::job::post');
    }

    /**
     * Determine whether the user can restore.
     */
    public function restore(User $user, JobPost $jobPost): bool
    {
        return $user->can('restore_admin::job::post::job::post');
    }

    /**
     * Determine whether the user can bulk restore.
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_admin::job::post::job::post');
    }

    /**
     * Determine whether the user can replicate.
     */
    public function replicate(User $user, JobPost $jobPost): bool
    {
        return $user->can('replicate_admin::job::post::job::post');
    }

    /**
     * Determine whether the user can reorder.
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_admin::job::post::job::post');
    }
}
