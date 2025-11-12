<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $fillable = ['name', 'guard_name', 'program_id'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    // public function programs(): BelongsToMany
    // {
    //     return $this->belongsToMany(Program::class, 'program_role');
    // }

    // Role global
    public function scopeGlobal($query)
    {
        return $query->whereNull('program_id');
    }

    // Role per-tenant
    public function scopeTenant($query, $programId)
    {
        return $query->where('program_id', $programId);
    }
}
