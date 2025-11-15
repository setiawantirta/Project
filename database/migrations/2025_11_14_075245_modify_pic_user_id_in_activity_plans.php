<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('activity_plans', function (Blueprint $table) {
            // 1️⃣ Rename kolom
            $table->renameColumn('pic_user_id', 'lecturer_id');
        });

        Schema::table('activity_plans', function (Blueprint $table) {
            // 2️⃣ Pastikan tipenya cocok untuk FK
            $table->unsignedBigInteger('lecturer_id')->change();

            // 3️⃣ Tambahkan foreign key
            $table->foreign('lecturer_id')
                ->references('id')
                ->on('lecturers')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('activity_plans', function (Blueprint $table) {
            $table->dropForeign(['lecturer_id']);
        });

        Schema::table('activity_plans', function (Blueprint $table) {
            $table->renameColumn('lecturer_id', 'pic_user_id');
        });
    }
};
