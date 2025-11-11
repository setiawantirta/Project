<?php

namespace App\Filament\Program\Resources\Quizzes\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class QuizForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('course_schedule_id')
                    ->required()
                    ->numeric(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('type')
                    ->required()
                    ->default('formative'),
                TextInput::make('duration_minutes')
                    ->required()
                    ->numeric()
                    ->default(60),
                TextInput::make('max_attempts')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('passing_score')
                    ->required()
                    ->numeric()
                    ->default(60),
                Toggle::make('show_results_immediately')
                    ->required(),
                Toggle::make('randomize_questions')
                    ->required(),
                Toggle::make('randomize_options')
                    ->required(),
                DateTimePicker::make('available_from')
                    ->required(),
                DateTimePicker::make('available_until')
                    ->required(),
                TextInput::make('status')
                    ->required()
                    ->default('draft'),
            ]);
    }
}
