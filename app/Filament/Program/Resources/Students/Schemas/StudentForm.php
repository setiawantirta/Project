<?php

namespace App\Filament\Program\Resources\Students\Schemas;

use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
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
                            ->whereHas('roles', fn ($q) => $q->where('name', 'student'))
                            ->whereHas('programs', fn ($q) => $q->where('programs.id', Filament::getTenant()?->id))
                            ->whereDoesntHave('student', function ($q) use ($record) {
                                if ($record) {
                                    $q->where('id', '!=', $record->id);
                                }
                            })
                    )
                    ->searchable()
                    ->preload()
                    ->required()
                    ->helperText('Only users with student role assigned to this program and not yet registered as student are shown.'),
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
                TextInput::make('student_number')
                    ->required(),
                TextInput::make('entry_year')
                    ->required()
                    ->numeric(),
                TextInput::make('semester')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
                TextInput::make('gpa')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('total_credits')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('academic_advisor_id')
                    ->relationship(
                        name: 'academicAdvisor',
                        modifyQueryUsing: fn ($query) => $query
                            ->where('program_id', Filament::getTenant()?->id)
                            ->with('user')
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->user->name ?? $record->lecturer_number)
                    ->searchable(['lecturer_number'])
                    ->preload()
                    ->helperText('Select academic advisor (Dosen Wali) for this student.'),
            ]);
    }
}
