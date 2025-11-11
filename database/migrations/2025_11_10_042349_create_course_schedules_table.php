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
        Schema::create('course_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->foreignId('lecturer_id')->constrained()->cascadeOnDelete();
            $table->string('class_code'); // Kode Kelas (A, B, C)
            $table->string('academic_year'); // Tahun Akademik (2024/2025)
            $table->enum('semester_type', ['odd', 'even']); // Ganjil/Genap
            $table->integer('capacity')->default(40); // Kapasitas Mahasiswa
            $table->integer('enrolled_count')->default(0); // Jumlah mahasiswa terdaftar
            $table->string('room')->nullable(); // Ruangan
            $table->enum('day', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->boolean('is_online')->default(false);
            $table->string('meeting_link')->nullable(); // Link Zoom/GMeet
            $table->enum('status', ['draft', 'open', 'ongoing', 'closed'])->default('draft');
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['program_id', 'course_id', 'class_code', 'academic_year', 'semester_type'], 'unique_schedule');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_schedules');
    }
};
