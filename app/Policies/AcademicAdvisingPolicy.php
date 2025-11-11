<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\AcademicAdvising;
use Illuminate\Auth\Access\HandlesAuthorization;

class AcademicAdvisingPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:AcademicAdvising');
    }

    public function view(AuthUser $authUser, AcademicAdvising $academicAdvising): bool
    {
        return $authUser->can('View:AcademicAdvising');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:AcademicAdvising');
    }

    public function update(AuthUser $authUser, AcademicAdvising $academicAdvising): bool
    {
        return $authUser->can('Update:AcademicAdvising');
    }

    public function delete(AuthUser $authUser, AcademicAdvising $academicAdvising): bool
    {
        return $authUser->can('Delete:AcademicAdvising');
    }

    public function restore(AuthUser $authUser, AcademicAdvising $academicAdvising): bool
    {
        return $authUser->can('Restore:AcademicAdvising');
    }

    public function forceDelete(AuthUser $authUser, AcademicAdvising $academicAdvising): bool
    {
        return $authUser->can('ForceDelete:AcademicAdvising');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:AcademicAdvising');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:AcademicAdvising');
    }

    public function replicate(AuthUser $authUser, AcademicAdvising $academicAdvising): bool
    {
        return $authUser->can('Replicate:AcademicAdvising');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:AcademicAdvising');
    }

}