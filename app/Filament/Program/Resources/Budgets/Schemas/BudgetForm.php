<?php

namespace App\Filament\Program\Resources\Budgets\Schemas;

use Filament\Facades\Filament;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BudgetForm
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
                TextInput::make('fiscal_year')
                    ->required()
                    ->numeric(),
                TextInput::make('budget_code')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('allocated_amount')
                    ->required()
                    ->numeric(),
                TextInput::make('used_amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('remaining_amount')
                    ->required()
                    ->numeric(),
                TextInput::make('status')
                    ->required()
                    ->default('draft'),
                TextInput::make('approved_by')
                    ->numeric(),
                DateTimePicker::make('approved_at'),
                Textarea::make('approval_notes')
                    ->columnSpanFull(),
            ]);
    }
}
