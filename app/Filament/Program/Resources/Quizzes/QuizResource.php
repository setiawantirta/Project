<?php

namespace App\Filament\Program\Resources\Quizzes;

use App\Filament\Program\Resources\Quizzes\Pages\CreateQuiz;
use App\Filament\Program\Resources\Quizzes\Pages\EditQuiz;
use App\Filament\Program\Resources\Quizzes\Pages\ListQuizzes;
use App\Filament\Program\Resources\Quizzes\Schemas\QuizForm;
use App\Filament\Program\Resources\Quizzes\Tables\QuizzesTable;
use App\Models\Quiz;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QuizResource extends Resource
{
    protected static ?string $model = Quiz::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Exam Management';
    protected static string|BackedEnum|null $navigationIcon = null;
    protected static ?string $navigationLabel = 'Quizzes';
    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return QuizForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QuizzesTable::configure($table);
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
            'index' => ListQuizzes::route('/'),
            'create' => CreateQuiz::route('/create'),
            'edit' => EditQuiz::route('/{record}/edit'),
        ];
    }
}
