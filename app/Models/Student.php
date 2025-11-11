<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'program_id',
        'user_id',
        'student_number',
        'entry_year',
        'semester',
        'status',
        'gpa',
        'total_credits',
        'academic_advisor_id',
    ];

    protected $casts = [
        'entry_year' => 'integer',
        'semester' => 'integer',
        'gpa' => 'decimal:2',
        'total_credits' => 'integer',
    ];

    /**
     * Get the program that the student belongs to.
     */
    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the user account associated with this student.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the academic advisor (dosen wali) for this student.
     */
    public function academicAdvisor(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class, 'academic_advisor_id');
    }

    /**
     * Get all course enrollments for this student.
     */
    public function courseEnrollments(): HasMany
    {
        return $this->hasMany(CourseEnrollment::class);
    }

    /**
     * Get all quiz attempts by this student.
     */
    public function quizAttempts(): HasMany
    {
        return $this->hasMany(StudentQuizAttempt::class);
    }

    /**
     * Get all academic advising sessions for this student.
     */
    public function academicAdvisings(): HasMany
    {
        return $this->hasMany(AcademicAdvising::class);
    }

    /**
     * Get all advising bookings made by this student.
     */
    public function advisingBookings(): HasMany
    {
        return $this->hasMany(AdvisingBooking::class);
    }

    /**
     * Get the final project for this student.
     */
    public function finalProject(): HasOne
    {
        return $this->hasOne(FinalProject::class);
    }

    /**
     * Get full name with student number
     */
    public function getFullIdentityAttribute(): string
    {
        return "{$this->user->name} ({$this->student_number})";
    }

    /**
     * Check if student is active
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }
}
