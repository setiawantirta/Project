<?php

namespace App\Filament\Program\Resources\ActivityPlans\Schemas;

use App\Models\Lecturer;
use Filament\Facades\Filament;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ActivityPlanForm
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
                Select::make('budget_id')
                    ->relationship('budget', 'name')
                    ->getOptionLabelFromRecordUsing(fn ($record) =>
                        '<strong>' . $record->budget_code . '</strong> : ' . $record->name
                    )
                    ->searchable()
                    ->allowHtml()
                    ->preload()
                    ->required(),
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
                // TextInput::make('pic_user_id')
                //     ->numeric(),
                Select::make('lecturer_id')
                    ->label('PIC Lecturer')
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
                TextInput::make('participant_count')
                    ->numeric(),
                Select::make('category')
                    ->options([
                        'academic' => 'Academic',
                        'research' => 'Research',
                        'community_service' => 'Community Service',
                        'event' => 'Event',
                        'procurement' => 'Procurement',
                        'other' => 'Other',
                    ])
                    ->native(false)
                    ->default('academic'),
                Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'submitted' => 'Submitted',
                        'approved' => 'Approved',
                        'ongoing' => 'Ongoing',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->native(false)
                    ->default('draft'),
            ]);
    }
}
