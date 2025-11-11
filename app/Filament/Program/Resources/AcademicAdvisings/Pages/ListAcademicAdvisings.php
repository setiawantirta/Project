<?php

namespace App\Filament\Program\Resources\AcademicAdvisings\Pages;

use App\Filament\Program\Resources\AcademicAdvisings\AcademicAdvisingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAcademicAdvisings extends ListRecords
{
    protected static string $resource = AcademicAdvisingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
