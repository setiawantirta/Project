<?php

namespace App\Filament\Program\Resources\Students\Pages;

use App\Filament\Program\Resources\Students\StudentResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;
}
