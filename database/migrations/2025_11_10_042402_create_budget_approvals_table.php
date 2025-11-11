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
        Schema::create('budget_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_proposal_id')->constrained()->cascadeOnDelete();
            $table->foreignId('approver_id')->constrained('users'); // Tendik Keuangan/Wadek
            $table->enum('approver_role', ['finance_staff', 'vice_dean', 'dean']); // Role yang approve
            $table->integer('approval_level')->default(1); // Level persetujuan (1, 2, 3)
            $table->enum('decision', ['approved', 'rejected', 'revision_requested']); // Keputusan
            $table->text('notes')->nullable(); // Catatan
            $table->text('revision_notes')->nullable(); // Catatan Revisi
            $table->dateTime('decision_date'); // Tanggal Keputusan
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['budget_proposal_id', 'approver_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_approvals');
    }
};
