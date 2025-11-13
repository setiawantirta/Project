<?php

namespace App\Filament\Program\Resources\BudgetApprovals\Schemas;

use Filament\Facades\Filament;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BudgetApprovalForm
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
                TextInput::make('budget_proposal_id')
                    ->required()
                    ->numeric(),
                TextInput::make('approver_id')
                    ->required()
                    ->numeric(),
                Select::make('approver_role')
                    ->options(['finance_staff' => 'Finance staff', 'vice_dean' => 'Vice dean', 'dean' => 'Dean'])
                    ->required(),
                TextInput::make('approval_level')
                    ->required()
                    ->numeric()
                    ->default(1),
                Select::make('decision')
                    ->options([
            'approved' => 'Approved',
            'rejected' => 'Rejected',
            'revision_requested' => 'Revision requested',
        ])
                    ->required(),
                Textarea::make('notes')
                    ->columnSpanFull(),
                Textarea::make('revision_notes')
                    ->columnSpanFull(),
                DateTimePicker::make('decision_date')
                    ->required(),
            ]);
    }
}
