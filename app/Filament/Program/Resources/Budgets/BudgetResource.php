<?php

namespace App\Filament\Program\Resources\Budgets;

use App\Filament\Program\Resources\Budgets\Pages\CreateBudget;
use App\Filament\Program\Resources\Budgets\Pages\EditBudget;
use App\Filament\Program\Resources\Budgets\Pages\ListBudgets;
use App\Filament\Program\Resources\Budgets\Schemas\BudgetForm;
use App\Filament\Program\Resources\Budgets\Tables\BudgetsTable;
use App\Models\Budget;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BudgetResource extends Resource
{
    protected static ?string $model = Budget::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Budget Management';
    protected static string|BackedEnum|null $navigationIcon = null;
    protected static ?string $navigationLabel = 'Budgets';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return BudgetForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BudgetsTable::configure($table);
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
            'index' => ListBudgets::route('/'),
            'create' => CreateBudget::route('/create'),
            'edit' => EditBudget::route('/{record}/edit'),
        ];
    }
}
