<?php

namespace App\Filament\Program\Resources\CourseSchedules\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CourseScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('program_id')
                    ->relationship('program', 'name')
                    ->required(),
                Select::make('course_id')
                    ->relationship('course', 'name')
                    ->required(),
                Select::make('lecturer_id')
                    ->relationship('lecturer', 'id')
                    ->required(),
                TextInput::make('class_code')
                    ->required(),
                TextInput::make('academic_year')
                    ->required(),
                TextInput::make('semester_type')
                    ->required(),
                TextInput::make('capacity')
                    ->required()
                    ->numeric()
                    ->default(40),
                TextInput::make('enrolled_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('room'),
                TextInput::make('day'),
                TimePicker::make('start_time'),
                TimePicker::make('end_time'),
                Toggle::make('is_online')
                    ->required(),
                TextInput::make('meeting_link'),
                TextInput::make('status')
                    ->required()
                    ->default('draft'),
            ]);
    }
}
