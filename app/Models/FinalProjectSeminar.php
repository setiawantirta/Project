<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FinalProjectSeminar extends Model
{
    protected $guarded = [];
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
    public function finalProjectSupervisors()
    {
        return $this->hasMany(FinalProjectSupervisor::class);
    }

    public function finalProject(): BelongsTo
    {
        return $this->belongsTo(FinalProject::class);
    }
}
