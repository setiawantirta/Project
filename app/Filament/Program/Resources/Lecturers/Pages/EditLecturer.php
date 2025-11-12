<?php

namespace App\Filament\Program\Resources\Lecturers\Pages;

use App\Filament\Program\Resources\Lecturers\LecturerResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditLecturer extends EditRecord
{
    protected static string $resource = LecturerResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load user avatar into form
        if ($this->record->user && $this->record->user->avatar) {
            $data['user_avatar'] = $this->record->user->avatar;
        }
        
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Save avatar to user
        if (isset($data['user_avatar']) && $this->record->user) {
            $this->record->user->update(['avatar' => $data['user_avatar']]);
        }
        
        // Remove user_avatar from lecturer data
        unset($data['user_avatar']);
        
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
