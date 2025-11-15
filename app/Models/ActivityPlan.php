<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityPlan extends Model
{

    protected $guarded = [];
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
    public function budget(): BelongsTo
    {
        return $this->belongsTo(Budget::class);
    }
    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class);
    }
    public function budgetProposals()
    {
        return $this->hasMany(BudgetProposal::class);
    }
}
