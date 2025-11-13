<?php

namespace App\Filament\Program\Resources\StudentQuizAttempts\Schemas;

use Filament\Facades\Filament;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class StudentQuizAttemptForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('program_id')
                    ->relationship('program', 'name')
                    ->default(fn () => Filament::getTenant()?->id)
                    ->disabled(fn () => Filament::getTenant() !== null)
                    ->dehydrated()
                    ->required(),
                TextInput::make('quiz_id')
                    ->required()
                    ->numeric(),
                TextInput::make('student_id')
                    ->required()
                    ->numeric(),
                TextInput::make('attempt_number')
                    ->required()
                    ->numeric(),
                TextInput::make('answers')
                    ->required(),
                TextInput::make('score')
                    ->numeric(),
                TextInput::make('percentage')
                    ->numeric(),
                DateTimePicker::make('started_at')
                    ->required(),
                DateTimePicker::make('submitted_at'),
                TextInput::make('time_spent_seconds')
                    ->numeric(),
                Select::make('status')
                    ->options(['in_progress' => 'In progress', 'submitted' => 'Submitted', 'graded' => 'Graded'])
                    ->default('in_progress')
                    ->required(),
                Textarea::make('feedback')
                    ->columnSpanFull(),
            ]);
    }
}
