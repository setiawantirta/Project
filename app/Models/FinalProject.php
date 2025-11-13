<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class FinalProject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'program_id',
        'student_id',
        'registration_number',
        'title',
        'abstract',
        'background',
        'keywords',
        'type',
        'field_of_study',
        'registration_date',
        'proposal_date',
        'qualification_date',
        'defense_date',
        'completion_date',
        'status',
        'proposal_score',
        'final_score',
        'final_grade',
        'document_path',
    ];

    protected $casts = [
        'keywords' => 'array',
        'registration_date' => 'date',
        'proposal_date' => 'date',
        'qualification_date' => 'date',
        'defense_date' => 'date',
        'completion_date' => 'date',
        'proposal_score' => 'decimal:2',
        'final_score' => 'decimal:2',
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function supervisors(): HasMany
    {
        return $this->hasMany(FinalProjectSupervisor::class);
    }
    public function finalProjectSeminars(): HasMany
    {
        return $this->hasMany(FinalProjectSeminar::class);
    }

    public function seminars(): HasMany
    {
        return $this->hasMany(FinalProjectSeminar::class);
    }

    public function getMainSupervisor()
    {
        return $this->supervisors()->where('role', 'main_supervisor')->first();
    }
}
