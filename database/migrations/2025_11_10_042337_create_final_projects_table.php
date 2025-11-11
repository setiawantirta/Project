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
        Schema::create('final_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->string('registration_number')->unique(); // Nomor Pendaftaran TA
            $table->string('title'); // Judul Tugas Akhir
            $table->text('abstract')->nullable();
            $table->text('background')->nullable(); // Latar Belakang
            $table->json('keywords')->nullable(); // Kata kunci
            $table->enum('type', ['thesis', 'applied_project', 'research'])->default('thesis'); // Tesis/Proyek Terapan/Penelitian
            $table->string('field_of_study')->nullable(); // Bidang Kajian
            $table->date('registration_date'); // Tanggal Daftar
            $table->date('proposal_date')->nullable(); // Tanggal Seminar Proposal
            $table->date('qualification_date')->nullable(); // Tanggal Seminar Kualifikasi (jika ada)
            $table->date('defense_date')->nullable(); // Tanggal Sidang
            $table->date('completion_date')->nullable(); // Tanggal Selesai
            $table->enum('status', [
                'registered', 'proposal_review', 'proposal_approved', 'proposal_revision',
                'ongoing', 'qualification', 'ready_defense', 'defense_scheduled', 
                'defense_passed', 'revision', 'completed', 'cancelled'
            ])->default('registered');
            $table->decimal('proposal_score', 5, 2)->nullable(); // Nilai Proposal
            $table->decimal('final_score', 5, 2)->nullable(); // Nilai Akhir
            $table->string('final_grade', 2)->nullable(); // A, B+, B, C+, C, D, E
            $table->string('document_path')->nullable(); // Path dokumen TA
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_projects');
    }
};
