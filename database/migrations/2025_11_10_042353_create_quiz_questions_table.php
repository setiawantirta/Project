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
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->constrained()->cascadeOnDelete();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->foreignId('learning_outcome_id')->nullable()->constrained()->nullOnDelete(); // Link ke CPL/CPMK
            $table->enum('type', ['multiple_choice', 'true_false', 'essay', 'matching'])->default('multiple_choice');
            $table->text('question'); // Soal
            $table->json('options')->nullable(); // Pilihan jawaban untuk multiple choice
            $table->text('correct_answer'); // Jawaban yang benar
            $table->text('explanation')->nullable(); // Penjelasan jawaban
            $table->decimal('points', 5, 2)->default(1.00); // Poin soal
            $table->integer('order')->default(0); // Urutan soal
            $table->string('image')->nullable(); // Gambar soal (opsional)
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_questions');
    }
};
