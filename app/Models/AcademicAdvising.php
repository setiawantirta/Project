<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicAdvising extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'program_id',
        'student_id',
        'lecturer_id',
        'meeting_date',
        'semester',
        'academic_year',
        'discussion_topics',
        'solutions_provided',
        'planned_courses',
        'approval_status',
        'approved_by',
        'approved_at',
        'notes',
    ];

    protected $casts = [
        'meeting_date' => 'date',
        'planned_courses' => 'array',
        'approved_at' => 'datetime',
    ];

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
