<?php

namespace App\Filament\Program\Resources\BudgetProposals\Pages;

use App\Filament\Program\Resources\BudgetProposals\BudgetProposalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBudgetProposals extends ListRecords
{
    protected static string $resource = BudgetProposalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
