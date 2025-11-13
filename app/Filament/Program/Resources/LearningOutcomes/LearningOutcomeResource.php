<?php

namespace App\Filament\Program\Resources\LearningOutcomes;

use App\Filament\Program\Resources\LearningOutcomes\Pages\CreateLearningOutcome;
use App\Filament\Program\Resources\LearningOutcomes\Pages\EditLearningOutcome;
use App\Filament\Program\Resources\LearningOutcomes\Pages\ListLearningOutcomes;
use App\Filament\Program\Resources\LearningOutcomes\Schemas\LearningOutcomeForm;
use App\Filament\Program\Resources\LearningOutcomes\Tables\LearningOutcomesTable;
use App\Models\LearningOutcome;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LearningOutcomeResource extends Resource
{
    protected static ?string $model = LearningOutcome::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'OBE Management';
    protected static string|BackedEnum|null $navigationIcon = null;
    protected static ?string $navigationLabel = 'Learning Outcomes';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return LearningOutcomeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LearningOutcomesTable::configure($table);
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
            'index' => ListLearningOutcomes::route('/'),
            'create' => CreateLearningOutcome::route('/create'),
            'edit' => EditLearningOutcome::route('/{record}/edit'),
        ];
    }
}
