<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\FinalProject;
use Illuminate\Auth\Access\HandlesAuthorization;

class FinalProjectPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:FinalProject');
    }

    public function view(AuthUser $authUser, FinalProject $finalProject): bool
    {
        return $authUser->can('View:FinalProject');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:FinalProject');
    }

    public function update(AuthUser $authUser, FinalProject $finalProject): bool
    {
        return $authUser->can('Update:FinalProject');
    }

    public function delete(AuthUser $authUser, FinalProject $finalProject): bool
    {
        return $authUser->can('Delete:FinalProject');
    }

    public function restore(AuthUser $authUser, FinalProject $finalProject): bool
    {
        return $authUser->can('Restore:FinalProject');
    }

    public function forceDelete(AuthUser $authUser, FinalProject $finalProject): bool
    {
        return $authUser->can('ForceDelete:FinalProject');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:FinalProject');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:FinalProject');
    }

    public function replicate(AuthUser $authUser, FinalProject $finalProject): bool
    {
        return $authUser->can('Replicate:FinalProject');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:FinalProject');
    }

}