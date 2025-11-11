<?php

namespace App\Filament\Program\Resources\ActivityPlans\Pages;

use App\Filament\Program\Resources\ActivityPlans\ActivityPlanResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditActivityPlan extends EditRecord
{
    protected static string $resource = ActivityPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
