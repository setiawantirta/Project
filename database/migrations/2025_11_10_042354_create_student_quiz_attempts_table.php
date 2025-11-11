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
        Schema::create('student_quiz_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->integer('attempt_number'); // Percobaan ke berapa
            $table->json('answers'); // Jawaban mahasiswa dalam JSON
            $table->decimal('score', 5, 2)->nullable(); // Nilai yang didapat
            $table->decimal('percentage', 5, 2)->nullable(); // Persentase
            $table->dateTime('started_at'); // Mulai mengerjakan
            $table->dateTime('submitted_at')->nullable(); // Waktu submit
            $table->integer('time_spent_seconds')->nullable(); // Waktu yang dihabiskan (detik)
            $table->enum('status', ['in_progress', 'submitted', 'graded'])->default('in_progress');
            $table->text('feedback')->nullable(); // Feedback dari dosen (untuk essay)
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['quiz_id', 'student_id', 'attempt_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_quiz_attempts');
    }
};
