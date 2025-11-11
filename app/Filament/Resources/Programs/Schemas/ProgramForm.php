<?php

namespace App\Filament\Resources\Programs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('level')
                    ->required()
                    ->default('S1'),
                TextInput::make('accreditation'),
                TextInput::make('accreditation_year')
                    ->numeric(),
                TextInput::make('head_of_program'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('logo'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
