<?php

namespace App\Filament\Program\Resources\BudgetApprovals;

use App\Filament\Program\Resources\BudgetApprovals\Pages\CreateBudgetApproval;
use App\Filament\Program\Resources\BudgetApprovals\Pages\EditBudgetApproval;
use App\Filament\Program\Resources\BudgetApprovals\Pages\ListBudgetApprovals;
use App\Filament\Program\Resources\BudgetApprovals\Schemas\BudgetApprovalForm;
use App\Filament\Program\Resources\BudgetApprovals\Tables\BudgetApprovalsTable;
use App\Models\BudgetApproval;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BudgetApprovalResource extends Resource
{
    protected static ?string $model = BudgetApproval::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Budget Management';
    protected static string|BackedEnum|null $navigationIcon = null;
    protected static ?string $navigationLabel = 'Budgets Approvals';
    protected static ?int $navigationSort = 4;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return BudgetApprovalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BudgetApprovalsTable::configure($table);
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
            'index' => ListBudgetApprovals::route('/'),
            'create' => CreateBudgetApproval::route('/create'),
            'edit' => EditBudgetApproval::route('/{record}/edit'),
        ];
    }
}
