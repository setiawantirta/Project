<?php

namespace App\Filament\Program\Resources\CourseEnrollments\Pages;

use App\Filament\Program\Resources\CourseEnrollments\CourseEnrollmentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCourseEnrollment extends CreateRecord
{
    protected static string $resource = CourseEnrollmentResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
