<?php

namespace App\Filament\Program\Resources\CourseSchedules\Schemas;

use App\Models\Lecturer;
use Filament\Facades\Filament;
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
                    ->default(fn () => Filament::getTenant()?->id)
                    ->disabled(fn () => Filament::getTenant() !== null)
                    ->dehydrated()
                    ->required(),
                Select::make('course_id')
                    ->relationship('course', 'name')
                    ->required(),
                Select::make('lecturer_id')
                    ->label('Lecturer')
                    ->options(function () {
                        return Lecturer::with('user')
                            ->whereHas('user.roles', fn($q) => $q->where('name', 'lecturer'))
                            ->whereHas('program', fn($q) => $q->where('programs.id', Filament::getTenant()?->id))
                            ->get()
                            ->pluck('user.name', 'id'); // key = lecturer.id, value = user.name
                    })
                    ->searchable()
                    ->preload()
                    ->required()
                    ->helperText('Only users with lecturer role assigned to this program are shown.'),
                TextInput::make('class_code')
                    ->required(),
                TextInput::make('academic_year')
                    ->required(),
                Select::make('semester_type')
                    ->options([
                        'odd' => 'Odd',
                        'even' => 'Even',
                    ])
                    ->native(false)
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
                Select::make('day')
                    ->options([
                        'monday' => 'Monday',
                        'tuesday' => 'Tuesday',
                        'wednesday' => 'Wednesday',
                        'thursday' => 'Thursday',
                        'friday' => 'Friday',
                        'saturday' => 'Saturday',
                        'sunday' => 'Sunday',
                    ])
                    ->native(false),
                TimePicker::make('start_time'),
                TimePicker::make('end_time'),
                Toggle::make('is_online')
                    ->required(),
                TextInput::make('meeting_link'),
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'open' => 'Open',
                        'ongoing' => 'Ongoing', 
                        'closed' => 'Closed',
                    ])
                    ->native(false),
            ]);
    }
}
