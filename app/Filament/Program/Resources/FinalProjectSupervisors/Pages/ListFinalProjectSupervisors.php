<?php

namespace App\Filament\Program\Resources\FinalProjectSupervisors\Pages;

use App\Filament\Program\Resources\FinalProjectSupervisors\FinalProjectSupervisorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFinalProjectSupervisors extends ListRecords
{
    protected static string $resource = FinalProjectSupervisorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
