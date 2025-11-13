<?php

namespace App\Filament\Program\Resources\AcademicAdvisings\Schemas;

use Filament\Facades\Filament;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AcademicAdvisingForm
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
                TextInput::make('student_id')
                    ->required()
                    ->numeric(),
                TextInput::make('lecturer_id')
                    ->required()
                    ->numeric(),
                TextInput::make('academic_year')
                    ->required(),
                TextInput::make('semester_type')
                    ->required(),
                DateTimePicker::make('meeting_date')
                    ->required(),
                Textarea::make('discussion_topics')
                    ->columnSpanFull(),
                Textarea::make('student_problems')
                    ->columnSpanFull(),
                Textarea::make('solutions')
                    ->columnSpanFull(),
                Textarea::make('recommendations')
                    ->columnSpanFull(),
                Textarea::make('notes')
                    ->columnSpanFull(),
                Textarea::make('planned_courses')
                    ->columnSpanFull(),
                TextInput::make('planned_credits')
                    ->numeric(),
                Toggle::make('is_approved')
                    ->required(),
                DateTimePicker::make('approved_at'),
                TextInput::make('status')
                    ->required()
                    ->default('scheduled'),
            ]);
    }
}
