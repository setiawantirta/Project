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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete(); // Relasi ke Program
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Relasi ke User
            $table->string('student_number')->unique(); // NIM
            $table->year('entry_year'); // Tahun Masuk
            $table->integer('semester')->default(1); // Semester saat ini
            $table->enum('status', ['active', 'leave', 'graduate', 'dropout'])->default('active');
            $table->decimal('gpa', 3, 2)->default(0.00); // IPK
            $table->integer('total_credits')->default(0); // Total SKS
            $table->foreignId('academic_advisor_id')->nullable()->constrained('lecturers'); // Dosen Wali
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['program_id', 'student_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
