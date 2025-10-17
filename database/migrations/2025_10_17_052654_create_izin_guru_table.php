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
        Schema::create('izin_guru', function (Blueprint $table) {
            $table->id();        
            $table->dateTime('waktu_izin');    
            $table->smallInteger('jam_mulai');
            $table->smallInteger('jam_selesai');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('mata_pelajaran_id')->nullable();
            $table->foreign('mata_pelajaran_id')->references('id')->on('mata_pelajarans')->onDelete('set null');
            $table->string('status_ketidakhadiran');
            $table->string('keterangan');
            $table->unsignedBigInteger('guru_pengganti_id')->nullable();
            $table->foreign('guru_pengganti_id')->references('id')->on('users')->onDelete('set null');
            $table->string('bentuk_tugas');
            $table->smallInteger('status')->default(0);
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
        Schema::dropIfExists('izin_guru');
    }
};
