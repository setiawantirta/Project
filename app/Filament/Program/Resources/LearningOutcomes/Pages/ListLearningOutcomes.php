<?php

namespace App\Filament\Program\Resources\LearningOutcomes\Pages;

use App\Filament\Program\Resources\LearningOutcomes\LearningOutcomeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLearningOutcomes extends ListRecords
{
    protected static string $resource = LearningOutcomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
