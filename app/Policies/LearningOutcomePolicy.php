<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\LearningOutcome;
use Illuminate\Auth\Access\HandlesAuthorization;

class LearningOutcomePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:LearningOutcome');
    }

    public function view(AuthUser $authUser, LearningOutcome $learningOutcome): bool
    {
        return $authUser->can('View:LearningOutcome');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:LearningOutcome');
    }

    public function update(AuthUser $authUser, LearningOutcome $learningOutcome): bool
    {
        return $authUser->can('Update:LearningOutcome');
    }

    public function delete(AuthUser $authUser, LearningOutcome $learningOutcome): bool
    {
        return $authUser->can('Delete:LearningOutcome');
    }

    public function restore(AuthUser $authUser, LearningOutcome $learningOutcome): bool
    {
        return $authUser->can('Restore:LearningOutcome');
    }

    public function forceDelete(AuthUser $authUser, LearningOutcome $learningOutcome): bool
    {
        return $authUser->can('ForceDelete:LearningOutcome');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:LearningOutcome');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:LearningOutcome');
    }

    public function replicate(AuthUser $authUser, LearningOutcome $learningOutcome): bool
    {
        return $authUser->can('Replicate:LearningOutcome');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:LearningOutcome');
    }

}