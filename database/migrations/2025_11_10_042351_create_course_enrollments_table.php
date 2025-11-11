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
        Schema::create('course_enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_schedule_id')->constrained()->cascadeOnDelete();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->date('enrollment_date');
            $table->enum('status', ['enrolled', 'dropped', 'completed'])->default('enrolled');
            $table->decimal('attendance_percentage', 5, 2)->default(0.00); // Persentase Kehadiran
            $table->decimal('assignment_score', 5, 2)->nullable(); // Nilai Tugas
            $table->decimal('quiz_score', 5, 2)->nullable(); // Nilai Kuis
            $table->decimal('midterm_score', 5, 2)->nullable(); // UTS
            $table->decimal('final_score', 5, 2)->nullable(); // UAS
            $table->decimal('final_grade', 5, 2)->nullable(); // Nilai Akhir
            $table->string('letter_grade', 2)->nullable(); // A, B+, B, C+, C, D, E
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['course_schedule_id', 'student_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_enrollments');
    }
};
