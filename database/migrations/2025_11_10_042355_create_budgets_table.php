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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->nullable()->constrained()->cascadeOnDelete(); // Null = Budget Fakultas
            $table->year('fiscal_year'); // Tahun Anggaran
            $table->string('budget_code')->unique(); // Kode Anggaran
            $table->string('name'); // Nama Anggaran
            $table->text('description')->nullable();
            $table->decimal('allocated_amount', 15, 2); // Pagu yang dialokasikan
            $table->decimal('used_amount', 15, 2)->default(0); // Anggaran terpakai
            $table->decimal('remaining_amount', 15, 2); // Sisa anggaran
            $table->enum('status', ['draft', 'proposed', 'approved', 'active', 'closed'])->default('draft');
            $table->foreignId('approved_by')->nullable()->constrained('users'); // User yang approve
            $table->dateTime('approved_at')->nullable();
            $table->text('approval_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['program_id', 'fiscal_year', 'budget_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
