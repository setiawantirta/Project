<?php

namespace App\Filament\Program\Resources\AdvisingSchedules\Pages;

use App\Filament\Program\Resources\AdvisingSchedules\AdvisingScheduleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAdvisingSchedule extends EditRecord
{
    protected static string $resource = AdvisingScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
