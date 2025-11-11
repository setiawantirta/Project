<?php

namespace App\Filament\Program\Resources\FinalProjectSeminars\Pages;

use App\Filament\Program\Resources\FinalProjectSeminars\FinalProjectSeminarResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFinalProjectSeminar extends EditRecord
{
    protected static string $resource = FinalProjectSeminarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
