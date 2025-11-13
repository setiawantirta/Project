<?php

namespace App\Filament\Program\Resources\FinalProjectSupervisors\Schemas;

use App\Models\Lecturer;
use Filament\Facades\Filament;
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
                Select::make('lecturer_id')
                    ->label('Lecturer')
                    ->options(function () {
                        return Lecturer::with('user')
                            ->whereHas('user.roles', fn($q) => $q->where('name', 'lecturer'))
                            ->whereHas('program', fn($q) => $q->where('programs.id', Filament::getTenant()?->id))
                            ->get()
                            ->pluck('user.name', 'id'); // key = lecturer.id, value = user.name
                    })
                    ->searchable()
                    ->preload()
                    ->required()
                    ->helperText('Only users with lecturer role assigned to this program are shown.'),
                
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
