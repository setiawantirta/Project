<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseSchedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'program_id',
        'course_id',
        'lecturer_id',
        'class_code',
        'academic_year',
        'semester_type',
        'capacity',
        'enrolled_count',
        'room',
        'day',
        'start_time',
        'end_time',
        'is_online',
        'meeting_link',
        'status',
    ];

    protected $casts = [
        'capacity' => 'integer',
        'enrolled_count' => 'integer',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_online' => 'boolean',
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(CourseEnrollment::class);
    }

    public function quizzes(): HasMany
    {
        return $this->hasMany(Quiz::class);
    }

    public function isFull(): bool
    {
        return $this->enrolled_count >= $this->capacity;
    }
}
