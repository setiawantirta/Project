<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ActivityPlan;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPlanPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ActivityPlan');
    }

    public function view(AuthUser $authUser, ActivityPlan $activityPlan): bool
    {
        return $authUser->can('View:ActivityPlan');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ActivityPlan');
    }

    public function update(AuthUser $authUser, ActivityPlan $activityPlan): bool
    {
        return $authUser->can('Update:ActivityPlan');
    }

    public function delete(AuthUser $authUser, ActivityPlan $activityPlan): bool
    {
        return $authUser->can('Delete:ActivityPlan');
    }

    public function restore(AuthUser $authUser, ActivityPlan $activityPlan): bool
    {
        return $authUser->can('Restore:ActivityPlan');
    }

    public function forceDelete(AuthUser $authUser, ActivityPlan $activityPlan): bool
    {
        return $authUser->can('ForceDelete:ActivityPlan');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ActivityPlan');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ActivityPlan');
    }

    public function replicate(AuthUser $authUser, ActivityPlan $activityPlan): bool
    {
        return $authUser->can('Replicate:ActivityPlan');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ActivityPlan');
    }

}