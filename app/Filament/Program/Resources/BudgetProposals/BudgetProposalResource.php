<?php

namespace App\Filament\Program\Resources\BudgetProposals;

use App\Filament\Program\Resources\BudgetProposals\Pages\CreateBudgetProposal;
use App\Filament\Program\Resources\BudgetProposals\Pages\EditBudgetProposal;
use App\Filament\Program\Resources\BudgetProposals\Pages\ListBudgetProposals;
use App\Filament\Program\Resources\BudgetProposals\Schemas\BudgetProposalForm;
use App\Filament\Program\Resources\BudgetProposals\Tables\BudgetProposalsTable;
use App\Models\BudgetProposal;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BudgetProposalResource extends Resource
{
    protected static ?string $model = BudgetProposal::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Budget Management';
    protected static string|BackedEnum|null $navigationIcon = null;
    protected static ?string $navigationLabel = 'Budgets Proposals';
    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return BudgetProposalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BudgetProposalsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBudgetProposals::route('/'),
            'create' => CreateBudgetProposal::route('/create'),
            'edit' => EditBudgetProposal::route('/{record}/edit'),
        ];
    }
}
