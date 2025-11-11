<?php

namespace App\Filament\Program\Resources\AccountabilityReports\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AccountabilityReportsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('activity_plan_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('budget_proposal_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('program_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('report_number')
                    ->searchable(),
                TextColumn::make('total_budget')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('total_spent')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('remaining')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('lpj_document')
                    ->searchable(),
                TextColumn::make('submitted_by')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('submitted_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge(),
                TextColumn::make('reviewed_by')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('reviewed_at')
                    ->dateTime()
                    ->sortable(),
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
