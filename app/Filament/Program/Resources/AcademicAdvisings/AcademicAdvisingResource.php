<?php

namespace App\Filament\Program\Resources\AcademicAdvisings;

use App\Filament\Program\Resources\AcademicAdvisings\Pages\CreateAcademicAdvising;
use App\Filament\Program\Resources\AcademicAdvisings\Pages\EditAcademicAdvising;
use App\Filament\Program\Resources\AcademicAdvisings\Pages\ListAcademicAdvisings;
use App\Filament\Program\Resources\AcademicAdvisings\Schemas\AcademicAdvisingForm;
use App\Filament\Program\Resources\AcademicAdvisings\Tables\AcademicAdvisingsTable;
use App\Models\AcademicAdvising;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AcademicAdvisingResource extends Resource
{
    protected static ?string $model = AcademicAdvising::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Advising Management';
    protected static string|BackedEnum|null $navigationIcon = null;
    protected static ?string $navigationLabel = 'Academic Advisings';
    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return AcademicAdvisingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AcademicAdvisingsTable::configure($table);
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
            'index' => ListAcademicAdvisings::route('/'),
            'create' => CreateAcademicAdvising::route('/create'),
            'edit' => EditAcademicAdvising::route('/{record}/edit'),
        ];
    }
}
