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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->string('code')->unique(); // Kode Mata Kuliah
            $table->string('name'); // Nama Mata Kuliah
            $table->text('description')->nullable();
            $table->integer('credits'); // SKS
            $table->integer('semester'); // Semester berapa MK ini diajarkan
            $table->enum('type', ['mandatory', 'elective'])->default('mandatory'); // Wajib/Pilihan
            $table->string('curriculum_year'); // Kurikulum tahun berapa (2020, 2021, dst)
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['program_id', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
