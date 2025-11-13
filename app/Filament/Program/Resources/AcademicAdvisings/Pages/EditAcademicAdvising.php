<?php

namespace App\Filament\Program\Resources\AcademicAdvisings\Pages;

use App\Filament\Program\Resources\AcademicAdvisings\AcademicAdvisingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAcademicAdvising extends EditRecord
{
    protected static string $resource = AcademicAdvisingResource::class;
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
