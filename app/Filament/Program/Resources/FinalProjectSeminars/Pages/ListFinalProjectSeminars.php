<?php

namespace App\Filament\Program\Resources\FinalProjectSeminars\Pages;

use App\Filament\Program\Resources\FinalProjectSeminars\FinalProjectSeminarResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFinalProjectSeminars extends ListRecords
{
    protected static string $resource = FinalProjectSeminarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
