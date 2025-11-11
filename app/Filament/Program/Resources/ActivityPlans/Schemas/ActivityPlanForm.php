<?php

namespace App\Filament\Program\Resources\ActivityPlans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ActivityPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('program_id')
                    ->required()
                    ->numeric(),
                TextInput::make('budget_id')
                    ->required()
                    ->numeric(),
                TextInput::make('activity_code')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Textarea::make('objectives')
                    ->columnSpanFull(),
                Textarea::make('expected_outcomes')
                    ->columnSpanFull(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
                TextInput::make('location'),
                TextInput::make('pic_user_id')
                    ->numeric(),
                TextInput::make('participant_count')
                    ->numeric(),
                TextInput::make('category')
                    ->required()
                    ->default('academic'),
                TextInput::make('status')
                    ->required()
                    ->default('draft'),
            ]);
    }
}
