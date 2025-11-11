<?php

namespace App\Filament\Program\Resources\FinalProjectSupervisors\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FinalProjectSupervisorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('final_project_id')
                    ->required()
                    ->numeric(),
                TextInput::make('lecturer_id')
                    ->required()
                    ->numeric(),
                Select::make('role')
                    ->options([
            'main_supervisor' => 'Main supervisor',
            'co_supervisor' => 'Co supervisor',
            'examiner' => 'Examiner',
        ])
                    ->required(),
                TextInput::make('order')
                    ->required()
                    ->numeric()
                    ->default(1),
                DatePicker::make('assignment_date')
                    ->required(),
                Select::make('status')
                    ->options([
            'assigned' => 'Assigned',
            'active' => 'Active',
            'completed' => 'Completed',
            'replaced' => 'Replaced',
        ])
                    ->default('assigned')
                    ->required(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
