<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\AdvisingSchedule;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvisingSchedulePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:AdvisingSchedule');
    }

    public function view(AuthUser $authUser, AdvisingSchedule $advisingSchedule): bool
    {
        return $authUser->can('View:AdvisingSchedule');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:AdvisingSchedule');
    }

    public function update(AuthUser $authUser, AdvisingSchedule $advisingSchedule): bool
    {
        return $authUser->can('Update:AdvisingSchedule');
    }

    public function delete(AuthUser $authUser, AdvisingSchedule $advisingSchedule): bool
    {
        return $authUser->can('Delete:AdvisingSchedule');
    }

    public function restore(AuthUser $authUser, AdvisingSchedule $advisingSchedule): bool
    {
        return $authUser->can('Restore:AdvisingSchedule');
    }

    public function forceDelete(AuthUser $authUser, AdvisingSchedule $advisingSchedule): bool
    {
        return $authUser->can('ForceDelete:AdvisingSchedule');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:AdvisingSchedule');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:AdvisingSchedule');
    }

    public function replicate(AuthUser $authUser, AdvisingSchedule $advisingSchedule): bool
    {
        return $authUser->can('Replicate:AdvisingSchedule');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:AdvisingSchedule');
    }

}