<?php

namespace App\Filament\Program\Resources\LearningOutcomes\Pages;

use App\Filament\Program\Resources\LearningOutcomes\LearningOutcomeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLearningOutcome extends CreateRecord
{
    protected static string $resource = LearningOutcomeResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
