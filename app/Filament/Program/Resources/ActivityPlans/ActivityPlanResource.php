<?php

namespace App\Filament\Program\Resources\ActivityPlans;

use App\Filament\Program\Resources\ActivityPlans\Pages\CreateActivityPlan;
use App\Filament\Program\Resources\ActivityPlans\Pages\EditActivityPlan;
use App\Filament\Program\Resources\ActivityPlans\Pages\ListActivityPlans;
use App\Filament\Program\Resources\ActivityPlans\Schemas\ActivityPlanForm;
use App\Filament\Program\Resources\ActivityPlans\Tables\ActivityPlansTable;
use App\Models\ActivityPlan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActivityPlanResource extends Resource
{
    protected static ?string $model = ActivityPlan::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Advising Management';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Activity Plans';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ActivityPlanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActivityPlansTable::configure($table);
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
            'index' => ListActivityPlans::route('/'),
            'create' => CreateActivityPlan::route('/create'),
            'edit' => EditActivityPlan::route('/{record}/edit'),
        ];
    }
}
