<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FinalProjectSupervisor extends Model
{
    protected $guarded = [];
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function finalProject(): BelongsTo
    {
        return $this->belongsTo(FinalProject::class);
    }

    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function finalProjectSeminar(): BelongsTo
    {
        return $this->belongsTo(FinalProjectSeminar::class);
    }
}
