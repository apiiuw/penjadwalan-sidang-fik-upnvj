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
        Schema::create('pendaftaran_sidang_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim_nip');
            $table->string('nik');
            $table->string('email');
            $table->string('program_studi');
            $table->string('tempat_tanggal_lahir');
            $table->string('judul_skripsi_tugas_akhir');
            $table->string('dosen_pembimbing');
            $table->string('url_presentasi_video');
            $table->string('buku_bimbingan');
            $table->string('ktp_kk_akta');
            $table->string('pas_foto_ijazah');
            $table->string('hasil_turnitin');
            $table->string('khs_kst');
            $table->string('ijazah_terakhir');
            $table->string('print_out_pembayaran');
            $table->string('sertifikat_toefl');
            $table->string('sertifikat_lainnya');
            $table->string('sertifikat_keahlian');
            $table->string('bukti_pkm')->nullable();
            $table->string('penulisan_skripsi_tugas_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_sidang_mahasiswa');
    }
};
