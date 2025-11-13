<?php

namespace App\Filament\Program\Resources\FinalProjectSeminars;

use App\Filament\Program\Resources\FinalProjectSeminars\Pages\CreateFinalProjectSeminar;
use App\Filament\Program\Resources\FinalProjectSeminars\Pages\EditFinalProjectSeminar;
use App\Filament\Program\Resources\FinalProjectSeminars\Pages\ListFinalProjectSeminars;
use App\Filament\Program\Resources\FinalProjectSeminars\Schemas\FinalProjectSeminarForm;
use App\Filament\Program\Resources\FinalProjectSeminars\Tables\FinalProjectSeminarsTable;
use App\Models\FinalProjectSeminar;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FinalProjectSeminarResource extends Resource
{
    protected static ?string $model = FinalProjectSeminar::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Project Management';
    protected static string|BackedEnum|null $navigationIcon = null;
    protected static ?string $navigationLabel = 'Final Projects Seminars';
    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return FinalProjectSeminarForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FinalProjectSeminarsTable::configure($table);
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
            'index' => ListFinalProjectSeminars::route('/'),
            'create' => CreateFinalProjectSeminar::route('/create'),
            'edit' => EditFinalProjectSeminar::route('/{record}/edit'),
        ];
    }
}
