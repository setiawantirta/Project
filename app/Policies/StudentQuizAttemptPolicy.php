<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\StudentQuizAttempt;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentQuizAttemptPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:StudentQuizAttempt');
    }

    public function view(AuthUser $authUser, StudentQuizAttempt $studentQuizAttempt): bool
    {
        return $authUser->can('View:StudentQuizAttempt');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:StudentQuizAttempt');
    }

    public function update(AuthUser $authUser, StudentQuizAttempt $studentQuizAttempt): bool
    {
        return $authUser->can('Update:StudentQuizAttempt');
    }

    public function delete(AuthUser $authUser, StudentQuizAttempt $studentQuizAttempt): bool
    {
        return $authUser->can('Delete:StudentQuizAttempt');
    }

    public function restore(AuthUser $authUser, StudentQuizAttempt $studentQuizAttempt): bool
    {
        return $authUser->can('Restore:StudentQuizAttempt');
    }

    public function forceDelete(AuthUser $authUser, StudentQuizAttempt $studentQuizAttempt): bool
    {
        return $authUser->can('ForceDelete:StudentQuizAttempt');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:StudentQuizAttempt');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:StudentQuizAttempt');
    }

    public function replicate(AuthUser $authUser, StudentQuizAttempt $studentQuizAttempt): bool
    {
        return $authUser->can('Replicate:StudentQuizAttempt');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:StudentQuizAttempt');
    }

}