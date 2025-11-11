<?php

namespace App\Filament\Program\Resources\BudgetApprovals\Pages;

use App\Filament\Program\Resources\BudgetApprovals\BudgetApprovalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBudgetApprovals extends ListRecords
{
    protected static string $resource = BudgetApprovalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
