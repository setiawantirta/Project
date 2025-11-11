<?php

namespace App\Filament\Program\Resources\Courses\Pages;

use App\Filament\Program\Resources\Courses\CourseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourse extends CreateRecord
{
    protected static string $resource = CourseResource::class;
}
