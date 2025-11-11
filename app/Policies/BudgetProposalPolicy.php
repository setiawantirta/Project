<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\BudgetProposal;
use Illuminate\Auth\Access\HandlesAuthorization;

class BudgetProposalPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:BudgetProposal');
    }

    public function view(AuthUser $authUser, BudgetProposal $budgetProposal): bool
    {
        return $authUser->can('View:BudgetProposal');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:BudgetProposal');
    }

    public function update(AuthUser $authUser, BudgetProposal $budgetProposal): bool
    {
        return $authUser->can('Update:BudgetProposal');
    }

    public function delete(AuthUser $authUser, BudgetProposal $budgetProposal): bool
    {
        return $authUser->can('Delete:BudgetProposal');
    }

    public function restore(AuthUser $authUser, BudgetProposal $budgetProposal): bool
    {
        return $authUser->can('Restore:BudgetProposal');
    }

    public function forceDelete(AuthUser $authUser, BudgetProposal $budgetProposal): bool
    {
        return $authUser->can('ForceDelete:BudgetProposal');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:BudgetProposal');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:BudgetProposal');
    }

    public function replicate(AuthUser $authUser, BudgetProposal $budgetProposal): bool
    {
        return $authUser->can('Replicate:BudgetProposal');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:BudgetProposal');
    }

}