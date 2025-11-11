<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\AdvisingBooking;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdvisingBookingPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:AdvisingBooking');
    }

    public function view(AuthUser $authUser, AdvisingBooking $advisingBooking): bool
    {
        return $authUser->can('View:AdvisingBooking');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:AdvisingBooking');
    }

    public function update(AuthUser $authUser, AdvisingBooking $advisingBooking): bool
    {
        return $authUser->can('Update:AdvisingBooking');
    }

    public function delete(AuthUser $authUser, AdvisingBooking $advisingBooking): bool
    {
        return $authUser->can('Delete:AdvisingBooking');
    }

    public function restore(AuthUser $authUser, AdvisingBooking $advisingBooking): bool
    {
        return $authUser->can('Restore:AdvisingBooking');
    }

    public function forceDelete(AuthUser $authUser, AdvisingBooking $advisingBooking): bool
    {
        return $authUser->can('ForceDelete:AdvisingBooking');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:AdvisingBooking');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:AdvisingBooking');
    }

    public function replicate(AuthUser $authUser, AdvisingBooking $advisingBooking): bool
    {
        return $authUser->can('Replicate:AdvisingBooking');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:AdvisingBooking');
    }

}