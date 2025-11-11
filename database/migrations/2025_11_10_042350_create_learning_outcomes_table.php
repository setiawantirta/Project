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
        Schema::create('learning_outcomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->string('code'); // Kode CPL/CPMK (e.g., CPL-1, CPMK-2)
            $table->enum('type', ['cpl', 'cpmk']); // CPL (Capaian Pembelajaran Lulusan) or CPMK (Capaian Pembelajaran MK)
            $table->text('description'); // Deskripsi capaian pembelajaran
            $table->string('bloom_taxonomy')->nullable(); // C1-C6 (Remember, Understand, Apply, Analyze, Evaluate, Create)
            $table->integer('weight')->default(0); // Bobot dalam penilaian (%)
            $table->integer('order')->default(0); // Urutan
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['course_id', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('learning_outcomes');
    }
};
