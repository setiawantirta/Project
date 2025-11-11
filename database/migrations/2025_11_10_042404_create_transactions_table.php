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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_proposal_id')->constrained()->cascadeOnDelete();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->string('transaction_number')->unique(); // Nomor Transaksi
            $table->date('transaction_date'); // Tanggal Transaksi
            $table->enum('type', ['expense', 'income', 'transfer', 'adjustment'])->default('expense'); // Jenis Transaksi
            $table->string('description'); // Deskripsi
            $table->decimal('amount', 15, 2); // Jumlah
            $table->string('payment_method')->nullable(); // Metode Pembayaran (Cash, Transfer, Cheque)
            $table->string('reference_number')->nullable(); // Nomor Referensi (No. Kwitansi, No. Transfer)
            $table->string('vendor_name')->nullable(); // Nama Vendor/Penerima
            $table->string('receipt_document')->nullable(); // Bukti Transaksi/Kwitansi
            $table->foreignId('recorded_by')->constrained('users'); // Yang mencatat
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
