<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\BudgetApproval;
use Illuminate\Auth\Access\HandlesAuthorization;

class BudgetApprovalPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:BudgetApproval');
    }

    public function view(AuthUser $authUser, BudgetApproval $budgetApproval): bool
    {
        return $authUser->can('View:BudgetApproval');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:BudgetApproval');
    }

    public function update(AuthUser $authUser, BudgetApproval $budgetApproval): bool
    {
        return $authUser->can('Update:BudgetApproval');
    }

    public function delete(AuthUser $authUser, BudgetApproval $budgetApproval): bool
    {
        return $authUser->can('Delete:BudgetApproval');
    }

    public function restore(AuthUser $authUser, BudgetApproval $budgetApproval): bool
    {
        return $authUser->can('Restore:BudgetApproval');
    }

    public function forceDelete(AuthUser $authUser, BudgetApproval $budgetApproval): bool
    {
        return $authUser->can('ForceDelete:BudgetApproval');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:BudgetApproval');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:BudgetApproval');
    }

    public function replicate(AuthUser $authUser, BudgetApproval $budgetApproval): bool
    {
        return $authUser->can('Replicate:BudgetApproval');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:BudgetApproval');
    }

}