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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Kode Prodi (e.g., SDATA, BIO, KIM)
            $table->string('name'); // Nama Program Studi
            $table->string('slug')->unique();
            $table->enum('level', ['D3', 'D4', 'S1', 'S2', 'S3'])->default('S1');
            $table->string('accreditation')->nullable(); // Akreditasi
            $table->year('accreditation_year')->nullable();
            $table->string('head_of_program')->nullable(); // Ketua Program Studi
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
