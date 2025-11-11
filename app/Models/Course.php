<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'program_id',
        'code',
        'name',
        'description',
        'credits',
        'semester',
        'type',
        'curriculum_year',
        'is_active',
    ];

    protected $casts = [
        'credits' => 'integer',
        'semester' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Get the program that owns the course.
     */
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get all schedules for this course.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(CourseSchedule::class);
    }

    /**
     * Get all learning outcomes for this course.
     */
    public function learningOutcomes(): HasMany
    {
        return $this->hasMany(LearningOutcome::class);
    }

    /**
     * Get course full name with code
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->code} - {$this->name}";
    }

    /**
     * Check if course is mandatory
     */
    public function isMandatory(): bool
    {
        return $this->type === 'mandatory';
    }
}
