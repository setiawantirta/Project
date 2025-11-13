<?php

namespace App\Filament\Program\Resources\BudgetProposals\Pages;

use App\Filament\Program\Resources\BudgetProposals\BudgetProposalResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBudgetProposal extends EditRecord
{
    protected static string $resource = BudgetProposalResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
