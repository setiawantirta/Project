<?php

namespace App\Filament\Program\Resources\StudentQuizAttempts\Pages;

use App\Filament\Program\Resources\StudentQuizAttempts\StudentQuizAttemptResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditStudentQuizAttempt extends EditRecord
{
    protected static string $resource = StudentQuizAttemptResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
