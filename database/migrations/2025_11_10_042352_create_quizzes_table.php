<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_schedule_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['formative', 'summative', 'midterm', 'final'])->default('formative');
            $table->integer('duration_minutes')->default(60); // Durasi dalam menit
            $table->integer('max_attempts')->default(1); // Jumlah percobaan maksimal
            $table->decimal('passing_score', 5, 2)->default(60.00); // Nilai minimal lulus
            $table->boolean('show_results_immediately')->default(false); // Tampilkan hasil langsung
            $table->boolean('randomize_questions')->default(false); // Acak pertanyaan
            $table->boolean('randomize_options')->default(false); // Acak pilihan jawaban
            $table->dateTime('available_from'); // Mulai bisa dikerjakan
            $table->dateTime('available_until'); // Deadline
            $table->enum('status', ['draft', 'published', 'closed'])->default('draft');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
