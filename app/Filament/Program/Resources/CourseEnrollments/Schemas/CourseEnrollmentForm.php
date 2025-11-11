<?php

namespace App\Filament\Program\Resources\CourseEnrollments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CourseEnrollmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('course_schedule_id')
                    ->required()
                    ->numeric(),
                TextInput::make('student_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('enrollment_date')
                    ->required(),
                Select::make('status')
                    ->options(['enrolled' => 'Enrolled', 'dropped' => 'Dropped', 'completed' => 'Completed'])
                    ->default('enrolled')
                    ->required(),
                TextInput::make('attendance_percentage')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('assignment_score')
                    ->numeric(),
                TextInput::make('quiz_score')
                    ->numeric(),
                TextInput::make('midterm_score')
                    ->numeric(),
                TextInput::make('final_score')
                    ->numeric(),
                TextInput::make('final_grade')
                    ->numeric(),
                TextInput::make('letter_grade'),
            ]);
    }
}
