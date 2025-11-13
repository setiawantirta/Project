<?php

namespace App\Filament\Program\Resources\AdvisingSchedules\Pages;

use App\Filament\Program\Resources\AdvisingSchedules\AdvisingScheduleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAdvisingSchedule extends CreateRecord
{
    protected static string $resource = AdvisingScheduleResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
