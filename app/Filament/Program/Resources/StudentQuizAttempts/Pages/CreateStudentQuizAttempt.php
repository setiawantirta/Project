<?php

namespace App\Filament\Program\Resources\StudentQuizAttempts\Pages;

use App\Filament\Program\Resources\StudentQuizAttempts\StudentQuizAttemptResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStudentQuizAttempt extends CreateRecord
{
    protected static string $resource = StudentQuizAttemptResource::class;
}
