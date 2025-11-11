<?php

namespace App\Filament\Program\Resources\Students\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
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
                TextInput::make('student_number')
                    ->required(),
                TextInput::make('entry_year')
                    ->required()
                    ->numeric(),
                TextInput::make('semester')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
                TextInput::make('gpa')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('total_credits')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('academic_advisor_id')
                    ->relationship('academicAdvisor', 'id'),
            ]);
    }
}
