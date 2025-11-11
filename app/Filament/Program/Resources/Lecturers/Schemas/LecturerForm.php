<?php

namespace App\Filament\Program\Resources\Lecturers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LecturerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('program_id')
                    ->relationship('program', 'name')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                TextInput::make('lecturer_number')
                    ->required(),
                TextInput::make('employment_status')
                    ->required()
                    ->default('permanent'),
                TextInput::make('academic_title'),
                TextInput::make('functional_position'),
                TextInput::make('expertise'),
                TextInput::make('scholar_id'),
                TextInput::make('scopus_id'),
                TextInput::make('sinta_id'),
                TextInput::make('max_advisees')
                    ->required()
                    ->numeric()
                    ->default(10),
            ]);
    }
}
