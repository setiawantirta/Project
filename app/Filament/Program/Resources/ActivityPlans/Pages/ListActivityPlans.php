<?php

namespace App\Filament\Program\Resources\ActivityPlans\Pages;

use App\Filament\Program\Resources\ActivityPlans\ActivityPlanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListActivityPlans extends ListRecords
{
    protected static string $resource = ActivityPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
