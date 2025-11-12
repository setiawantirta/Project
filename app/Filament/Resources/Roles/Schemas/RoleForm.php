<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Role Name')
                    ->required(),

                Select::make('program_id')
                    ->label('Program')
                    ->relationship('program', 'name')
                    ->searchable()
                    ->nullable()
                    ->helperText('Kosongkan jika ini adalah role global.')
                    ->visible(fn() => filament()->getCurrentPanel()->getId() === 'AdminPanel'),
                Select::make('guard_name')
                ->options(['web' => 'Web'])
                ->default('web')
                ->required(),
            ]);
    }
}
