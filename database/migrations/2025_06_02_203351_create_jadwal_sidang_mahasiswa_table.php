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
        Schema::create('jadwal_sidang_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim_nip');
            $table->string('program_studi');
            $table->string('tempat_pelaksanaan')->nullable();
            $table->string('gedung_pelaksanaan')->nullable();
            $table->date('tanggal_pelaksanaan')->nullable();
            $table->time('waktu_pelaksanaan')->nullable();
            $table->string('dosen_pembimbing1')->nullable();
            $table->string('dosen_pembimbing2')->nullable();
            $table->string('dosen_penguji1')->nullable();
            $table->string('dosen_penguji2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_sidang_mahasiswa');
    }
};
