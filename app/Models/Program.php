<?php

namespace App\Models;

use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Program extends Model implements HasName
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'slug',
        'level',
        'accreditation',
        'accreditation_year',
        'head_of_program',
        'email',
        'phone',
        'description',
        'logo',
        'is_active',
    ];

    protected $casts = [
        'accreditation_year' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($program) {
            if (empty($program->slug)) {
                $program->slug = Str::slug($program->name);
            }
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get all students in this program.
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    /**
     * Get all lecturers in this program.
     */
    public function lecturers(): HasMany
    {
        return $this->hasMany(Lecturer::class);
    }

    /**
     * Get all courses in this program.
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    /**
     * Get all course schedules in this program.
     */
    public function courseSchedules(): HasMany
    {
        return $this->hasMany(CourseSchedule::class);
    }

    /**
     * Get all final projects in this program.
     */
    public function finalProjects(): HasMany
    {
        return $this->hasMany(FinalProject::class);
    }

    /**
     * Get all budgets for this program.
     */
    public function budgets(): HasMany
    {
        return $this->hasMany(Budget::class);
    }

    /**
     * Get all activity plans for this program.
     */
    public function activityPlans(): HasMany
    {
        return $this->hasMany(ActivityPlan::class);
    }

    /**
     * Get all advising schedules in this program.
     */
    public function advisingSchedules(): HasMany
    {
        return $this->hasMany(AdvisingSchedule::class);
    }

    /**
     * Get all members (users) of this program.
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'program_user')
            // ->withPivot('role')
            ->withTimestamps();
    }

    /**
     * Get the name for Filament tenant display.
     */
    public function getFilamentName(): string
    {
        return $this->name;
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}
