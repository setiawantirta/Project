<?php

namespace App\Filament\Program\Resources\AccountabilityReports\Pages;

use App\Filament\Program\Resources\AccountabilityReports\AccountabilityReportResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAccountabilityReport extends EditRecord
{
    protected static string $resource = AccountabilityReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
