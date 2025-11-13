<?php

namespace App\Filament\Program\Resources\FinalProjects;

use App\Filament\Program\Resources\FinalProjects\Pages\CreateFinalProject;
use App\Filament\Program\Resources\FinalProjects\Pages\EditFinalProject;
use App\Filament\Program\Resources\FinalProjects\Pages\ListFinalProjects;
use App\Filament\Program\Resources\FinalProjects\Schemas\FinalProjectForm;
use App\Filament\Program\Resources\FinalProjects\Tables\FinalProjectsTable;
use App\Models\FinalProject;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FinalProjectResource extends Resource
{
    protected static ?string $model = FinalProject::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Project Management';
    protected static string|BackedEnum|null $navigationIcon = null;
    protected static ?string $navigationLabel = 'Final Projects';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return FinalProjectForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FinalProjectsTable::configure($table);
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
            'index' => ListFinalProjects::route('/'),
            'create' => CreateFinalProject::route('/create'),
            'edit' => EditFinalProject::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
