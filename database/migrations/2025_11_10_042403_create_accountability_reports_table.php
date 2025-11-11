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
        Schema::create('accountability_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_plan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('budget_proposal_id')->constrained()->cascadeOnDelete();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->string('report_number')->unique(); // Nomor LPJ
            $table->text('executive_summary')->nullable(); // Ringkasan Eksekutif
            $table->text('activity_report')->nullable(); // Laporan Kegiatan
            $table->json('outcomes')->nullable(); // Hasil/Luaran Kegiatan
            $table->json('participants_data')->nullable(); // Data Peserta
            $table->decimal('total_budget', 15, 2); // Total Anggaran
            $table->decimal('total_spent', 15, 2); // Total Realisasi
            $table->decimal('remaining', 15, 2); // Sisa
            $table->json('financial_details')->nullable(); // Detail Keuangan (breakdown per item)
            $table->text('constraints')->nullable(); // Kendala yang dihadapi
            $table->text('recommendations')->nullable(); // Rekomendasi
            $table->string('lpj_document')->nullable(); // Dokumen LPJ
            $table->json('supporting_documents')->nullable(); // Dokumen Pendukung (foto, sertifikat, dll)
            $table->foreignId('submitted_by')->constrained('users');
            $table->dateTime('submitted_at');
            $table->enum('status', ['draft', 'submitted', 'reviewed', 'approved', 'rejected', 'revision'])->default('draft');
            $table->foreignId('reviewed_by')->nullable()->constrained('users');
            $table->dateTime('reviewed_at')->nullable();
            $table->text('review_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accountability_reports');
    }
};
