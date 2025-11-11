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
        Schema::create('activity_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->foreignId('budget_id')->constrained()->cascadeOnDelete();
            $table->string('activity_code')->unique(); // Kode Kegiatan
            $table->string('name'); // Nama Kegiatan
            $table->text('description')->nullable();
            $table->text('objectives')->nullable(); // Tujuan Kegiatan
            $table->text('expected_outcomes')->nullable(); // Luaran yang Diharapkan
            $table->date('start_date'); // Tanggal Mulai
            $table->date('end_date'); // Tanggal Selesai
            $table->string('location')->nullable(); // Lokasi Kegiatan
            $table->foreignId('pic_user_id')->nullable()->constrained('users'); // PIC/Penanggung Jawab
            $table->integer('participant_count')->nullable(); // Jumlah Peserta
            $table->enum('category', ['academic', 'research', 'community_service', 'event', 'procurement', 'other'])->default('academic');
            $table->enum('status', ['draft', 'submitted', 'approved', 'ongoing', 'completed', 'cancelled'])->default('draft');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_plans');
    }
};
