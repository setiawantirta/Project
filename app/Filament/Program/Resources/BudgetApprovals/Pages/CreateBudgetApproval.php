<?php

namespace App\Filament\Program\Resources\BudgetApprovals\Pages;

use App\Filament\Program\Resources\BudgetApprovals\BudgetApprovalResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBudgetApproval extends CreateRecord
{
    protected static string $resource = BudgetApprovalResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
