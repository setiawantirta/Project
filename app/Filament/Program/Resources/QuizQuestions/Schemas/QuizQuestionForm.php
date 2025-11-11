<?php

namespace App\Filament\Program\Resources\QuizQuestions\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class QuizQuestionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('quiz_id')
                    ->required()
                    ->numeric(),
                TextInput::make('learning_outcome_id')
                    ->numeric(),
                Select::make('type')
                    ->options([
            'multiple_choice' => 'Multiple choice',
            'true_false' => 'True false',
            'essay' => 'Essay',
            'matching' => 'Matching',
        ])
                    ->default('multiple_choice')
                    ->required(),
                Textarea::make('question')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('options'),
                Textarea::make('correct_answer')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('explanation')
                    ->columnSpanFull(),
                TextInput::make('points')
                    ->required()
                    ->numeric()
                    ->default(1.0),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                FileUpload::make('image')
                    ->image(),
            ]);
    }
}
