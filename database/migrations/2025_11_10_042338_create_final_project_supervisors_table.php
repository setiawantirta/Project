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
        Schema::create('final_project_supervisors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('final_project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('lecturer_id')->constrained()->cascadeOnDelete();
            $table->enum('role', ['main_supervisor', 'co_supervisor', 'examiner']); // Pembimbing Utama/Co-Pembimbing/Penguji
            $table->integer('order')->default(1); // Urutan (Pembimbing 1, 2, dst)
            $table->date('assignment_date'); // Tanggal Penugasan
            $table->enum('status', ['assigned', 'active', 'completed', 'replaced'])->default('assigned');
            $table->text('notes')->nullable(); // Catatan
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['final_project_id', 'lecturer_id', 'role'], 'fp_supervisor_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_project_supervisors');
    }
};
