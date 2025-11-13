<?php

namespace App\Filament\Program\Resources\AdvisingBookings;

use App\Filament\Program\Resources\AdvisingBookings\Pages\CreateAdvisingBooking;
use App\Filament\Program\Resources\AdvisingBookings\Pages\EditAdvisingBooking;
use App\Filament\Program\Resources\AdvisingBookings\Pages\ListAdvisingBookings;
use App\Filament\Program\Resources\AdvisingBookings\Schemas\AdvisingBookingForm;
use App\Filament\Program\Resources\AdvisingBookings\Tables\AdvisingBookingsTable;
use App\Models\AdvisingBooking;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AdvisingBookingResource extends Resource
{
    protected static ?string $model = AdvisingBooking::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Advising Management';
    protected static string|BackedEnum|null $navigationIcon = null;
    protected static ?string $navigationLabel = 'Advisings Bookings';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return AdvisingBookingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AdvisingBookingsTable::configure($table);
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
            'index' => ListAdvisingBookings::route('/'),
            'create' => CreateAdvisingBooking::route('/create'),
            'edit' => EditAdvisingBooking::route('/{record}/edit'),
        ];
    }
}
