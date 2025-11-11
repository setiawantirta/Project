<?php

namespace App\Filament\Program\Resources\CourseSchedules\Pages;

use App\Filament\Program\Resources\CourseSchedules\CourseScheduleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourseSchedule extends CreateRecord
{
    protected static string $resource = CourseScheduleResource::class;
}
