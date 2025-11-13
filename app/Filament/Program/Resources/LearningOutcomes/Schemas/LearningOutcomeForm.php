<?php

namespace App\Filament\Program\Resources\LearningOutcomes\Schemas;

use Filament\Facades\Filament;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LearningOutcomeForm
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
                TextInput::make('course_id')
                    ->required()
                    ->numeric(),
                // Select::make('course_id')
                //     ->relationship('course', 'name')
                //     ->required(),
                TextInput::make('code')
                    ->required(),
                Select::make('type')
                    ->options(['cpl' => 'CPL', 'cpmk' => 'CPMK', 'subcpmk' => 'Sub CPMK'])
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('bloom_taxonomy'),
                TextInput::make('weight')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
