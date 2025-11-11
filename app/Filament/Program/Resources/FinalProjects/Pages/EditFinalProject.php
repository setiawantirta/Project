<?php

namespace App\Filament\Program\Resources\FinalProjects\Pages;

use App\Filament\Program\Resources\FinalProjects\FinalProjectResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditFinalProject extends EditRecord
{
    protected static string $resource = FinalProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
