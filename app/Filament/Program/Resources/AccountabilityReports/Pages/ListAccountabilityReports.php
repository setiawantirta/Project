<?php

namespace App\Filament\Program\Resources\AccountabilityReports\Pages;

use App\Filament\Program\Resources\AccountabilityReports\AccountabilityReportResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAccountabilityReports extends ListRecords
{
    protected static string $resource = AccountabilityReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
