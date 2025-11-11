<?php

namespace App\Filament\Program\Resources\CourseSchedules;

use App\Filament\Program\Resources\CourseSchedules\Pages\CreateCourseSchedule;
use App\Filament\Program\Resources\CourseSchedules\Pages\EditCourseSchedule;
use App\Filament\Program\Resources\CourseSchedules\Pages\ListCourseSchedules;
use App\Filament\Program\Resources\CourseSchedules\Schemas\CourseScheduleForm;
use App\Filament\Program\Resources\CourseSchedules\Tables\CourseSchedulesTable;
use App\Models\CourseSchedule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseScheduleResource extends Resource
{
    protected static ?string $model = CourseSchedule::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Course Management';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Courses Schedules';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CourseScheduleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CourseSchedulesTable::configure($table);
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
            'index' => ListCourseSchedules::route('/'),
            'create' => CreateCourseSchedule::route('/create'),
            'edit' => EditCourseSchedule::route('/{record}/edit'),
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
