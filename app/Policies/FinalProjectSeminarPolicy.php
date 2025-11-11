<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\FinalProjectSeminar;
use Illuminate\Auth\Access\HandlesAuthorization;

class FinalProjectSeminarPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:FinalProjectSeminar');
    }

    public function view(AuthUser $authUser, FinalProjectSeminar $finalProjectSeminar): bool
    {
        return $authUser->can('View:FinalProjectSeminar');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:FinalProjectSeminar');
    }

    public function update(AuthUser $authUser, FinalProjectSeminar $finalProjectSeminar): bool
    {
        return $authUser->can('Update:FinalProjectSeminar');
    }

    public function delete(AuthUser $authUser, FinalProjectSeminar $finalProjectSeminar): bool
    {
        return $authUser->can('Delete:FinalProjectSeminar');
    }

    public function restore(AuthUser $authUser, FinalProjectSeminar $finalProjectSeminar): bool
    {
        return $authUser->can('Restore:FinalProjectSeminar');
    }

    public function forceDelete(AuthUser $authUser, FinalProjectSeminar $finalProjectSeminar): bool
    {
        return $authUser->can('ForceDelete:FinalProjectSeminar');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:FinalProjectSeminar');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:FinalProjectSeminar');
    }

    public function replicate(AuthUser $authUser, FinalProjectSeminar $finalProjectSeminar): bool
    {
        return $authUser->can('Replicate:FinalProjectSeminar');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:FinalProjectSeminar');
    }

}