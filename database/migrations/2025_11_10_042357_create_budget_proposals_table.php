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
        Schema::create('budget_proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_plan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->string('proposal_number')->unique(); // Nomor RAB
            $table->json('items'); // Detail item RAB (JSON: [{name, quantity, unit, unit_price, total}])
            $table->decimal('total_amount', 15, 2); // Total RAB
            $table->text('notes')->nullable();
            $table->string('tor_document')->nullable(); // KAK/TOR Document Path
            $table->string('rab_document')->nullable(); // RAB Document Path
            $table->foreignId('submitted_by')->constrained('users'); // Yang mengajukan (Koor Prodi)
            $table->dateTime('submitted_at');
            $table->enum('status', ['draft', 'submitted', 'reviewed', 'approved', 'rejected', 'revision'])->default('draft');
            $table->text('rejection_reason')->nullable();
            $table->text('revision_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_proposals');
    }
};
