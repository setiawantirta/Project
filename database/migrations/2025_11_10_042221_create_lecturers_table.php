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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete(); // Relasi ke Program
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Relasi ke User
            $table->string('lecturer_number')->unique(); // NIDN/NIP
            $table->enum('employment_status', ['permanent', 'contract', 'part_time'])->default('permanent');
            $table->string('academic_title')->nullable(); // Gelar Akademik (S.Kom, M.Kom, Dr.)
            $table->string('functional_position')->nullable(); // Jabatan Fungsional (Asisten Ahli, Lektor, etc)
            $table->string('expertise')->nullable(); // Bidang Keahlian
            $table->string('scholar_id')->nullable(); // Google Scholar ID
            $table->string('scopus_id')->nullable();
            $table->string('sinta_id')->nullable();
            $table->integer('max_advisees')->default(10); // Max mahasiswa bimbingan
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['program_id', 'lecturer_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};
