<?php

namespace App\Filament\Program\Resources\AccountabilityReports\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AccountabilityReportForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('activity_plan_id')
                    ->required()
                    ->numeric(),
                TextInput::make('budget_proposal_id')
                    ->required()
                    ->numeric(),
                TextInput::make('program_id')
                    ->required()
                    ->numeric(),
                TextInput::make('report_number')
                    ->required(),
                Textarea::make('executive_summary')
                    ->columnSpanFull(),
                Textarea::make('activity_report')
                    ->columnSpanFull(),
                TextInput::make('outcomes'),
                TextInput::make('participants_data'),
                TextInput::make('total_budget')
                    ->required()
                    ->numeric(),
                TextInput::make('total_spent')
                    ->required()
                    ->numeric(),
                TextInput::make('remaining')
                    ->required()
                    ->numeric(),
                TextInput::make('financial_details'),
                Textarea::make('constraints')
                    ->columnSpanFull(),
                Textarea::make('recommendations')
                    ->columnSpanFull(),
                TextInput::make('lpj_document'),
                TextInput::make('supporting_documents'),
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
                TextInput::make('reviewed_by')
                    ->numeric(),
                DateTimePicker::make('reviewed_at'),
                Textarea::make('review_notes')
                    ->columnSpanFull(),
            ]);
    }
}
