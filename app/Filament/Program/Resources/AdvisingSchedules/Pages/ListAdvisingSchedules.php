<?php

namespace App\Filament\Program\Resources\AdvisingSchedules\Pages;

use App\Filament\Program\Resources\AdvisingSchedules\AdvisingScheduleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdvisingSchedules extends ListRecords
{
    protected static string $resource = AdvisingScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
