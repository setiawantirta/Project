<?php

namespace App\Filament\Program\Resources\Courses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('program_id')
                    ->relationship('program', 'name')
                    ->required(),
                TextInput::make('code')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('credits')
                    ->required()
                    ->numeric(),
                TextInput::make('semester')
                    ->required()
                    ->numeric(),
                TextInput::make('type')
                    ->required()
                    ->default('mandatory'),
                TextInput::make('curriculum_year')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
