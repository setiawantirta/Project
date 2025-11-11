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
        Schema::create('advising_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advising_schedule_id')->constrained()->cascadeOnDelete();
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->date('booking_date'); // Tanggal Booking
            $table->text('topic')->nullable(); // Topik yang ingin dibahas
            $table->text('notes')->nullable(); // Catatan dari mahasiswa
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled', 'no_show'])->default('pending');
            $table->dateTime('confirmed_at')->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['advising_schedule_id', 'student_id', 'booking_date'], 'advising_booking_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advising_bookings');
    }
};
