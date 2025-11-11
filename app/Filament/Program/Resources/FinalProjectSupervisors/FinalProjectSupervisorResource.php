<?php

namespace App\Filament\Program\Resources\FinalProjectSupervisors;

use App\Filament\Program\Resources\FinalProjectSupervisors\Pages\CreateFinalProjectSupervisor;
use App\Filament\Program\Resources\FinalProjectSupervisors\Pages\EditFinalProjectSupervisor;
use App\Filament\Program\Resources\FinalProjectSupervisors\Pages\ListFinalProjectSupervisors;
use App\Filament\Program\Resources\FinalProjectSupervisors\Schemas\FinalProjectSupervisorForm;
use App\Filament\Program\Resources\FinalProjectSupervisors\Tables\FinalProjectSupervisorsTable;
use App\Models\FinalProjectSupervisor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FinalProjectSupervisorResource extends Resource
{
    protected static ?string $model = FinalProjectSupervisor::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Project Management';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-presentation-chart-line';
    protected static ?string $navigationLabel = 'Final Projects Supervisors';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return FinalProjectSupervisorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FinalProjectSupervisorsTable::configure($table);
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
            'index' => ListFinalProjectSupervisors::route('/'),
            'create' => CreateFinalProjectSupervisor::route('/create'),
            'edit' => EditFinalProjectSupervisor::route('/{record}/edit'),
        ];
    }
}
