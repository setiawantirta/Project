<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'program_id',
        'user_id',
        'lecturer_number',
        'employment_status',
        'academic_title',
        'functional_position',
        'expertise',
        'scholar_id',
        'scopus_id',
        'sinta_id',
        'max_advisees',
    ];

    protected $casts = [
        'max_advisees' => 'integer',
    ];

    /**
     * Get the program that the lecturer belongs to.
     */
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the user account associated with this lecturer.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all course schedules taught by this lecturer.
     */
    public function courseSchedules(): HasMany
    {
        return $this->hasMany(CourseSchedule::class);
    }

    /**
     * Get all students advised by this lecturer (dosen wali).
     */
    public function advisedStudents(): HasMany
    {
        return $this->hasMany(Student::class, 'academic_advisor_id');
    }

    /**
     * Get all academic advising sessions conducted by this lecturer.
     */
    public function academicAdvisings(): HasMany
    {
        return $this->hasMany(AcademicAdvising::class);
    }

    /**
     * Get all advising schedules set by this lecturer.
     */
    public function advisingSchedules(): HasMany
    {
        return $this->hasMany(AdvisingSchedule::class);
    }

    /**
     * Get all final project supervisions.
     */
    public function finalProjectSupervisions(): HasMany
    {
        return $this->hasMany(FinalProjectSupervisor::class);
    }

    public function activityPlans(): HasMany
    {
        return $this->hasMany(ActivityPlan::class);
    }
    /**
     * Get lecturer's full name with title
     */
    public function getFullNameWithTitleAttribute(): string
    {
        $title = $this->academic_title ? "{$this->academic_title} " : '';
        return "{$title}{$this->user->name}";
    }

    /**
     * Check if lecturer can accept more advisees
     */
    public function canAcceptMoreAdvisees(): bool
    {
        return $this->advisedStudents()->count() < $this->max_advisees;
    }
}
