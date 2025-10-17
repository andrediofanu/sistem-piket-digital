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
        Schema::create('izin_siswa', function (Blueprint $table) {
            $table->id();
            $table->dateTime('waktu_izin');
            $table->unsignedBigInteger('kelas_id')->nullable();
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('set null');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('status_ketidakhadiran');
            $table->string('keterangan');
            $table->smallInteger('status')->default(0);
            $table->unsignedBigInteger('wali_kelas_id')->nullable();
            $table->foreign('wali_kelas_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('admin_piket_id')->nullable();
            $table->foreign('admin_piket_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izin_siswa');
    }
};
