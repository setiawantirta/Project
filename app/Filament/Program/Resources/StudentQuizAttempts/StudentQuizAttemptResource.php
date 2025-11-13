<?php

namespace App\Filament\Program\Resources\StudentQuizAttempts;

use App\Filament\Program\Resources\StudentQuizAttempts\Pages\CreateStudentQuizAttempt;
use App\Filament\Program\Resources\StudentQuizAttempts\Pages\EditStudentQuizAttempt;
use App\Filament\Program\Resources\StudentQuizAttempts\Pages\ListStudentQuizAttempts;
use App\Filament\Program\Resources\StudentQuizAttempts\Schemas\StudentQuizAttemptForm;
use App\Filament\Program\Resources\StudentQuizAttempts\Tables\StudentQuizAttemptsTable;
use App\Models\StudentQuizAttempt;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class StudentQuizAttemptResource extends Resource
{
    protected static ?string $model = StudentQuizAttempt::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|\UnitEnum|null $navigationGroup = 'Exam Management';
    protected static string|BackedEnum|null $navigationIcon = null;
    protected static ?string $navigationLabel = 'Student Quiz Attempts';
    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return StudentQuizAttemptForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StudentQuizAttemptsTable::configure($table);
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
            'index' => ListStudentQuizAttempts::route('/'),
            'create' => CreateStudentQuizAttempt::route('/create'),
            'edit' => EditStudentQuizAttempt::route('/{record}/edit'),
        ];
    }
}
