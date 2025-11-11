<?php

namespace App\Filament\Program\Resources\FinalProjects\Pages;

use App\Filament\Program\Resources\FinalProjects\FinalProjectResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFinalProjects extends ListRecords
{
    protected static string $resource = FinalProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
