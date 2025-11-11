<?php

namespace App\Filament\Program\Resources\AdvisingSchedules\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AdvisingScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('program_id')
                    ->required()
                    ->numeric(),
                TextInput::make('lecturer_id')
                    ->required()
                    ->numeric(),
                TextInput::make('academic_year')
                    ->required(),
                Select::make('semester_type')
                    ->options(['odd' => 'Odd', 'even' => 'Even'])
                    ->required(),
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
                    ->required(),
                TimePicker::make('start_time')
                    ->required(),
                TimePicker::make('end_time')
                    ->required(),
                TextInput::make('location'),
                Toggle::make('is_online')
                    ->required(),
                TextInput::make('meeting_link'),
                TextInput::make('quota')
                    ->required()
                    ->numeric()
                    ->default(5),
                Textarea::make('notes')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
