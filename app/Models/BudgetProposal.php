<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BudgetProposal extends Model
{
    protected $guarded = [];

    protected $casts = [
        'items' => 'array',
];
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }
    public function activityPlan(): BelongsTo
    {
        return $this->belongsTo(ActivityPlan::class);
    }
}
