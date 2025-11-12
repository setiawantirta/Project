<?php

namespace App\Filament\Program\Resources\Lecturers\Pages;

use App\Filament\Program\Resources\Lecturers\LecturerResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLecturer extends CreateRecord
{
    protected static string $resource = LecturerResource::class;

    protected ?string $avatar = null;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Remove user_avatar from lecturer data as it's saved separately
        $this->avatar = $data['user_avatar'] ?? null;
        unset($data['user_avatar']);
        
        return $data;
    }

    protected function afterCreate(): void
    {
        // Update user avatar after lecturer is created
        if ($this->avatar && $this->record->user) {
            $this->record->user->update(['avatar' => $this->avatar]);
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
