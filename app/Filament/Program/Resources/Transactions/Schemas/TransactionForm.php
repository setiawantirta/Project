<?php

namespace App\Filament\Program\Resources\Transactions\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('budget_proposal_id')
                    ->required()
                    ->numeric(),
                TextInput::make('program_id')
                    ->required()
                    ->numeric(),
                TextInput::make('transaction_number')
                    ->required(),
                DatePicker::make('transaction_date')
                    ->required(),
                Select::make('type')
                    ->options([
            'expense' => 'Expense',
            'income' => 'Income',
            'transfer' => 'Transfer',
            'adjustment' => 'Adjustment',
        ])
                    ->default('expense')
                    ->required(),
                TextInput::make('description')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('payment_method'),
                TextInput::make('reference_number'),
                TextInput::make('vendor_name'),
                TextInput::make('receipt_document'),
                TextInput::make('recorded_by')
                    ->required()
                    ->numeric(),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'completed' => 'Completed', 'cancelled' => 'Cancelled'])
                    ->default('pending')
                    ->required(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
