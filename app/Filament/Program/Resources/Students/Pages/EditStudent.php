<?php

namespace App\Filament\Program\Resources\Students\Pages;

use App\Filament\Program\Resources\Students\StudentResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditStudent extends EditRecord
{
    protected static string $resource = StudentResource::class;

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
        
        // Remove user_avatar from student data
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
