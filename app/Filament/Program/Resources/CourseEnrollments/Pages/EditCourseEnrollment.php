<?php

namespace App\Filament\Program\Resources\CourseEnrollments\Pages;

use App\Filament\Program\Resources\CourseEnrollments\CourseEnrollmentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCourseEnrollment extends EditRecord
{
    protected static string $resource = CourseEnrollmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
