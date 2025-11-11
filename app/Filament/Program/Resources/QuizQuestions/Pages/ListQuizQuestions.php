<?php

namespace App\Filament\Program\Resources\QuizQuestions\Pages;

use App\Filament\Program\Resources\QuizQuestions\QuizQuestionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListQuizQuestions extends ListRecords
{
    protected static string $resource = QuizQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
