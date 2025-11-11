<?php

namespace App\Filament\Program\Resources\FinalProjects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FinalProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('program_id')
                    ->relationship('program', 'name')
                    ->required(),
                Select::make('student_id')
                    ->relationship('student', 'id')
                    ->required(),
                TextInput::make('registration_number')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('abstract')
                    ->columnSpanFull(),
                Textarea::make('background')
                    ->columnSpanFull(),
                Textarea::make('keywords')
                    ->columnSpanFull(),
                TextInput::make('type')
                    ->required()
                    ->default('thesis'),
                TextInput::make('field_of_study'),
                DatePicker::make('registration_date')
                    ->required(),
                DatePicker::make('proposal_date'),
                DatePicker::make('qualification_date'),
                DatePicker::make('defense_date'),
                DatePicker::make('completion_date'),
                TextInput::make('status')
                    ->required()
                    ->default('registered'),
                TextInput::make('proposal_score')
                    ->numeric(),
                TextInput::make('final_score')
                    ->numeric(),
                TextInput::make('final_grade'),
                TextInput::make('document_path'),
            ]);
    }
}
