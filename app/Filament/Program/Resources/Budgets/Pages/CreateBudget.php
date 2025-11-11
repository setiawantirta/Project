<?php

namespace App\Filament\Program\Resources\Budgets\Pages;

use App\Filament\Program\Resources\Budgets\BudgetResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBudget extends CreateRecord
{
    protected static string $resource = BudgetResource::class;
}
