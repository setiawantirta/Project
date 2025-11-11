<?php

namespace App\Filament\Program\Resources\LearningOutcomes\Pages;

use App\Filament\Program\Resources\LearningOutcomes\LearningOutcomeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLearningOutcome extends EditRecord
{
    protected static string $resource = LearningOutcomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
