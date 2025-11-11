<?php

namespace App\Filament\Program\Resources\AdvisingBookings\Pages;

use App\Filament\Program\Resources\AdvisingBookings\AdvisingBookingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAdvisingBookings extends ListRecords
{
    protected static string $resource = AdvisingBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
