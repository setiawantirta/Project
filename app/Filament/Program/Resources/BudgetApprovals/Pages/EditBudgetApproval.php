<?php

namespace App\Filament\Program\Resources\BudgetApprovals\Pages;

use App\Filament\Program\Resources\BudgetApprovals\BudgetApprovalResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBudgetApproval extends EditRecord
{
    protected static string $resource = BudgetApprovalResource::class;
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
