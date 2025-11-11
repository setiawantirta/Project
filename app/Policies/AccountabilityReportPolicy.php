<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\AccountabilityReport;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountabilityReportPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:AccountabilityReport');
    }

    public function view(AuthUser $authUser, AccountabilityReport $accountabilityReport): bool
    {
        return $authUser->can('View:AccountabilityReport');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:AccountabilityReport');
    }

    public function update(AuthUser $authUser, AccountabilityReport $accountabilityReport): bool
    {
        return $authUser->can('Update:AccountabilityReport');
    }

    public function delete(AuthUser $authUser, AccountabilityReport $accountabilityReport): bool
    {
        return $authUser->can('Delete:AccountabilityReport');
    }

    public function restore(AuthUser $authUser, AccountabilityReport $accountabilityReport): bool
    {
        return $authUser->can('Restore:AccountabilityReport');
    }

    public function forceDelete(AuthUser $authUser, AccountabilityReport $accountabilityReport): bool
    {
        return $authUser->can('ForceDelete:AccountabilityReport');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:AccountabilityReport');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:AccountabilityReport');
    }

    public function replicate(AuthUser $authUser, AccountabilityReport $accountabilityReport): bool
    {
        return $authUser->can('Replicate:AccountabilityReport');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:AccountabilityReport');
    }

}