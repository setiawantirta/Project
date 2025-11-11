<?php

namespace App\Filament\Program\Resources\StudentQuizAttempts\Pages;

use App\Filament\Program\Resources\StudentQuizAttempts\StudentQuizAttemptResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStudentQuizAttempts extends ListRecords
{
    protected static string $resource = StudentQuizAttemptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
