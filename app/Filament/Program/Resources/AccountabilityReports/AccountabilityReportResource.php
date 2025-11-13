<?php

namespace App\Filament\Program\Resources\AccountabilityReports;

use App\Filament\Program\Resources\AccountabilityReports\Pages\CreateAccountabilityReport;
use App\Filament\Program\Resources\AccountabilityReports\Pages\EditAccountabilityReport;
use App\Filament\Program\Resources\AccountabilityReports\Pages\ListAccountabilityReports;
use App\Filament\Program\Resources\AccountabilityReports\Schemas\AccountabilityReportForm;
use App\Filament\Program\Resources\AccountabilityReports\Tables\AccountabilityReportsTable;
use App\Models\AccountabilityReport;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AccountabilityReportResource extends Resource
{
    protected static ?string $model = AccountabilityReport::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Budget Management';
    protected static string|BackedEnum|null $navigationIcon = null;
    protected static ?string $navigationLabel = 'Accountability Reports';
    protected static ?int $navigationSort = 5;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return AccountabilityReportForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AccountabilityReportsTable::configure($table);
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
            'index' => ListAccountabilityReports::route('/'),
            'create' => CreateAccountabilityReport::route('/create'),
            'edit' => EditAccountabilityReport::route('/{record}/edit'),
        ];
    }
}
