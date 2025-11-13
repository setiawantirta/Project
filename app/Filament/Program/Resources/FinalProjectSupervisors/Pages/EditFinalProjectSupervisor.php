<?php

namespace App\Filament\Program\Resources\FinalProjectSupervisors\Pages;

use App\Filament\Program\Resources\FinalProjectSupervisors\FinalProjectSupervisorResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFinalProjectSupervisor extends EditRecord
{
    protected static string $resource = FinalProjectSupervisorResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
