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
        Schema::create('final_project_seminars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('final_project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['proposal', 'qualification', 'defense']); // Jenis Seminar
            $table->dateTime('scheduled_at'); // Jadwal Seminar
            $table->string('room')->nullable(); // Ruangan
            $table->string('location')->nullable(); // Lokasi
            $table->boolean('is_online')->default(false);
            $table->string('meeting_link')->nullable(); // Link Meeting Online
            $table->text('agenda')->nullable(); // Agenda
            $table->enum('status', ['scheduled', 'ongoing', 'completed', 'postponed', 'cancelled'])->default('scheduled');
            $table->text('minutes')->nullable(); // Berita Acara
            $table->json('attendance')->nullable(); // Daftar Hadir (JSON: supervisor, examiner, audience)
            $table->decimal('score', 5, 2)->nullable(); // Nilai
            $table->text('feedback')->nullable(); // Feedback/Catatan
            $table->json('revision_notes')->nullable(); // Catatan Revisi
            $table->date('revision_deadline')->nullable(); // Deadline Revisi
            $table->boolean('revision_approved')->default(false); // Revisi Disetujui
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_project_seminars');
    }
};
