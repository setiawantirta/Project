<?php

namespace App\Filament\Program\Resources\FinalProjectSeminars\Schemas;

use Filament\Facades\Filament;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FinalProjectSeminarForm
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
                Select::make('final_project_id')
                    ->relationship('finalProject', 'title')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('type')
                    ->options(['proposal' => 'Proposal', 'qualification' => 'Qualification', 'defense' => 'Defense'])
                    ->required(),
                DateTimePicker::make('scheduled_at')
                    ->required(),
                TextInput::make('room'),
                TextInput::make('location'),
                Toggle::make('is_online')
                    ->required(),
                TextInput::make('meeting_link'),
                Textarea::make('agenda')
                    ->columnSpanFull(),
                Select::make('status')
                    ->options([
                            'scheduled' => 'Scheduled',
                            'ongoing' => 'Ongoing',
                            'completed' => 'Completed',
                            'postponed' => 'Postponed',
                            'cancelled' => 'Cancelled',
                        ])
                    ->default('scheduled')
                    ->required(),
                Textarea::make('minutes')
                    ->columnSpanFull(),
                TextInput::make('attendance'),
                TextInput::make('score')
                    ->numeric(),
                Textarea::make('feedback')
                    ->columnSpanFull(),
                TextInput::make('revision_notes'),
                DatePicker::make('revision_deadline'),
                Toggle::make('revision_approved')
                    ->required(),
            ]);
    }
}
