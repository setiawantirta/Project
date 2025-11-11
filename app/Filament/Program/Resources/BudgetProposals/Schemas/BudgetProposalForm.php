<?php

namespace App\Filament\Program\Resources\BudgetProposals\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BudgetProposalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('activity_plan_id')
                    ->required()
                    ->numeric(),
                TextInput::make('program_id')
                    ->required()
                    ->numeric(),
                TextInput::make('proposal_number')
                    ->required(),
                TextInput::make('items')
                    ->required(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
                Textarea::make('notes')
                    ->columnSpanFull(),
                TextInput::make('tor_document'),
                TextInput::make('rab_document'),
                TextInput::make('submitted_by')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('submitted_at')
                    ->required(),
                Select::make('status')
                    ->options([
            'draft' => 'Draft',
            'submitted' => 'Submitted',
            'reviewed' => 'Reviewed',
            'approved' => 'Approved',
            'rejected' => 'Rejected',
            'revision' => 'Revision',
        ])
                    ->default('draft')
                    ->required(),
                Textarea::make('rejection_reason')
                    ->columnSpanFull(),
                Textarea::make('revision_notes')
                    ->columnSpanFull(),
            ]);
    }
}
