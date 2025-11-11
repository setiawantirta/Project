<?php

namespace App\Filament\Program\Resources\AdvisingBookings\Pages;

use App\Filament\Program\Resources\AdvisingBookings\AdvisingBookingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAdvisingBooking extends EditRecord
{
    protected static string $resource = AdvisingBookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
