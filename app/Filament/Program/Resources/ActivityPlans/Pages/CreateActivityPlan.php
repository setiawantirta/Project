<?php

namespace App\Filament\Program\Resources\ActivityPlans\Pages;

use App\Filament\Program\Resources\ActivityPlans\ActivityPlanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateActivityPlan extends CreateRecord
{
    protected static string $resource = ActivityPlanResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
