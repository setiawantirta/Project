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
        Schema::create('academic_advisings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('lecturer_id')->constrained()->cascadeOnDelete(); // Dosen Wali
            $table->string('academic_year'); // Tahun Akademik
            $table->enum('semester_type', ['odd', 'even']); // Ganjil/Genap
            $table->dateTime('meeting_date'); // Tanggal Pertemuan
            $table->text('discussion_topics')->nullable(); // Topik Pembahasan
            $table->text('student_problems')->nullable(); // Masalah Mahasiswa
            $table->text('solutions')->nullable(); // Solusi yang Diberikan
            $table->text('recommendations')->nullable(); // Rekomendasi
            $table->text('notes')->nullable(); // Catatan Tambahan
            $table->json('planned_courses')->nullable(); // Rencana KRS (array course_id)
            $table->integer('planned_credits')->nullable(); // Total SKS yang direncanakan
            $table->boolean('is_approved')->default(false); // KRS Disetujui
            $table->dateTime('approved_at')->nullable();
            $table->enum('status', ['scheduled', 'completed', 'cancelled'])->default('scheduled');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_advisings');
    }
};
