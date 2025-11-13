<?php

namespace App\Filament\Program\Resources\AdvisingSchedules;

use App\Filament\Program\Resources\AdvisingSchedules\Pages\CreateAdvisingSchedule;
use App\Filament\Program\Resources\AdvisingSchedules\Pages\EditAdvisingSchedule;
use App\Filament\Program\Resources\AdvisingSchedules\Pages\ListAdvisingSchedules;
use App\Filament\Program\Resources\AdvisingSchedules\Schemas\AdvisingScheduleForm;
use App\Filament\Program\Resources\AdvisingSchedules\Tables\AdvisingSchedulesTable;
use App\Models\AdvisingSchedule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AdvisingScheduleResource extends Resource
{
    protected static ?string $model = AdvisingSchedule::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Advising Management';
    protected static string|BackedEnum|null $navigationIcon = null;
    protected static ?string $navigationLabel = 'Advisings Schedules';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return AdvisingScheduleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdvisingSchedulesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAdvisingSchedules::route('/'),
            'create' => CreateAdvisingSchedule::route('/create'),
            'edit' => EditAdvisingSchedule::route('/{record}/edit'),
        ];
    }
}
