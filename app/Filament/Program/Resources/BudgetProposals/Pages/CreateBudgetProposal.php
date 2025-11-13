<?php

namespace App\Filament\Program\Resources\BudgetProposals\Pages;

use App\Filament\Program\Resources\BudgetProposals\BudgetProposalResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBudgetProposal extends CreateRecord
{
    protected static string $resource = BudgetProposalResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
