<?php

namespace App\Filament\Program\Resources\FinalProjects\Schemas;

use App\Models\Student;
use Filament\Facades\Filament;
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
                    ->default(fn () => Filament::getTenant()?->id)
                    ->disabled(fn () => Filament::getTenant() !== null)
                    ->dehydrated()
                    ->required(), 
                Select::make('student_id')
                    ->label('Student')
                    ->options(function ($record) {
                        return Student::with('user')
                            ->whereHas('user.roles', fn($q) => $q->where('name', 'student'))
                            ->whereHas('program', fn($q) => $q->where('programs.id', Filament::getTenant()?->id))
                            ->where(function ($q) use ($record) {
                                // Jika sedang create (tidak ada $record)
                                if (!$record) {
                                    $q->whereDoesntHave('finalProject');
                                } else {
                                    // Jika edit: tampilkan semua student yang belum punya final project
                                    // atau student yang sedang diedit sekarang
                                    $q->whereDoesntHave('finalProject')
                                    ->orWhere('id', $record->student_id);
                                }
                            })
                            ->get()
                            ->pluck('user.name', 'id');
                    })
                    ->searchable()
                    ->preload()
                    ->disabled(fn($record) => filled($record))
                    ->required()
                    ->helperText('Only students from this program who do not yet have a final project are shown.'),

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
                Select::make('type')
                    ->options([
                        'thesis' => 'Thesis',
                        'applied_project' => 'Applied Project',
                        'research' => 'Research',
                    ])
                    ->required(),
                TextInput::make('field_of_study'),
                DatePicker::make('registration_date')
                    ->required(),
                DatePicker::make('proposal_date'),
                DatePicker::make('qualification_date'),
                DatePicker::make('defense_date'),
                DatePicker::make('completion_date'),
                Select::make('status')
                    ->options([
                        'registered' => 'Registered',
                        'proposal_review' => 'Proposal Review',
                        'proposal_approved' => 'Proposal Approved',
                        'proposal_revision' => 'Proposal Revision',
                        'ongoing' => 'Ongoing',
                        'qualification' => 'Qualification',
                        'ready_defense' => 'Ready for Defense',
                        'defense_scheduled' => 'Defense Scheduled',
                        'defense_passed' => 'Defense Passed',
                        'revision' => 'Revision',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
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
