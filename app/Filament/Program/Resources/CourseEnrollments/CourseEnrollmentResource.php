<?php

namespace App\Filament\Program\Resources\CourseEnrollments;

use App\Filament\Program\Resources\CourseEnrollments\Pages\CreateCourseEnrollment;
use App\Filament\Program\Resources\CourseEnrollments\Pages\EditCourseEnrollment;
use App\Filament\Program\Resources\CourseEnrollments\Pages\ListCourseEnrollments;
use App\Filament\Program\Resources\CourseEnrollments\Schemas\CourseEnrollmentForm;
use App\Filament\Program\Resources\CourseEnrollments\Tables\CourseEnrollmentsTable;
use App\Models\CourseEnrollment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CourseEnrollmentResource extends Resource
{
    protected static ?string $model = CourseEnrollment::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Course Management';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Course Enrollments';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CourseEnrollmentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CourseEnrollmentsTable::configure($table);
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
            'index' => ListCourseEnrollments::route('/'),
            'create' => CreateCourseEnrollment::route('/create'),
            'edit' => EditCourseEnrollment::route('/{record}/edit'),
        ];
    }
}
