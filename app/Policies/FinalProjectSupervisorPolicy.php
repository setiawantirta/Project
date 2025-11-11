<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\FinalProjectSupervisor;
use Illuminate\Auth\Access\HandlesAuthorization;

class FinalProjectSupervisorPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:FinalProjectSupervisor');
    }

    public function view(AuthUser $authUser, FinalProjectSupervisor $finalProjectSupervisor): bool
    {
        return $authUser->can('View:FinalProjectSupervisor');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:FinalProjectSupervisor');
    }

    public function update(AuthUser $authUser, FinalProjectSupervisor $finalProjectSupervisor): bool
    {
        return $authUser->can('Update:FinalProjectSupervisor');
    }

    public function delete(AuthUser $authUser, FinalProjectSupervisor $finalProjectSupervisor): bool
    {
        return $authUser->can('Delete:FinalProjectSupervisor');
    }

    public function restore(AuthUser $authUser, FinalProjectSupervisor $finalProjectSupervisor): bool
    {
        return $authUser->can('Restore:FinalProjectSupervisor');
    }

    public function forceDelete(AuthUser $authUser, FinalProjectSupervisor $finalProjectSupervisor): bool
    {
        return $authUser->can('ForceDelete:FinalProjectSupervisor');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:FinalProjectSupervisor');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:FinalProjectSupervisor');
    }

    public function replicate(AuthUser $authUser, FinalProjectSupervisor $finalProjectSupervisor): bool
    {
        return $authUser->can('Replicate:FinalProjectSupervisor');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:FinalProjectSupervisor');
    }

}