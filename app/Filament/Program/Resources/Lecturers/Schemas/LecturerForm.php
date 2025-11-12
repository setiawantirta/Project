<?php

namespace App\Filament\Program\Resources\Lecturers\Schemas;

use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LecturerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('program_id')
                    ->relationship('program', 'name')
                    ->default(fn () => Filament::getTenant()?->id)
                    ->disabled(fn () => Filament::getTenant() !== null)
                    ->dehydrated()
                    ->required(),
                Select::make('user_id')
                    ->relationship(
                        name: 'user',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn ($query, $record) => $query
                            ->whereHas('roles', fn ($q) => $q->where('name', 'lecturer'))
                            ->whereHas('programs', fn ($q) => $q->where('programs.id', Filament::getTenant()?->id))
                            ->whereDoesntHave('lecturer', function ($q) use ($record) {
                                if ($record) {
                                    $q->where('id', '!=', $record->id);
                                }
                            })
                    )
                    ->searchable()
                    ->preload()
                    ->required()
                    ->helperText('Only users with lecturer role assigned to this program and not yet registered as lecturer are shown.'),
                FileUpload::make('user_avatar')
                    ->label('User Avatar')
                    ->image()
                    ->avatar()
                    ->directory('avatars')
                    ->visibility('public')
                    ->imageEditor()
                    ->circleCropper()
                    ->helperText('Upload or change the avatar for the selected user.')
                    ->columnSpanFull(),
                TextInput::make('lecturer_number')
                    ->required(),
                TextInput::make('employment_status')
                    ->required()
                    ->default('permanent'),
                TextInput::make('academic_title'),
                TextInput::make('functional_position'),
                TextInput::make('expertise'),
                TextInput::make('scholar_id'),
                TextInput::make('scopus_id'),
                TextInput::make('sinta_id'),
                TextInput::make('max_advisees')
                    ->required()
                    ->numeric()
                    ->default(10),
            ]);
    }
}
