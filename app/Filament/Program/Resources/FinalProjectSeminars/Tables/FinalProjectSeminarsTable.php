<?php

namespace App\Filament\Program\Resources\FinalProjectSeminars\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FinalProjectSeminarsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                
                TextColumn::make('finalProject.student.user.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('finalProject.title')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('type')
                    ->badge(),
                TextColumn::make('scheduled_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('room')
                    ->searchable(),
                TextColumn::make('location')
                    ->searchable(),
                IconColumn::make('is_online')
                    ->boolean(),
                TextColumn::make('meeting_link')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('score')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('revision_deadline')
                    ->date()
                    ->sortable(),
                IconColumn::make('revision_approved')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
