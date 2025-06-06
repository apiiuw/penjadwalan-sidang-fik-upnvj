<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiSidangTable extends Migration
{
    public function up()
    {
        Schema::create('nilai_sidang', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim_nip');
            $table->string('email');
            $table->string('program_studi');
            $table->integer('ketua_nilai_presentasi')->nullable();
            $table->integer('ketua_nilai_penguasaan_materi')->nullable();
            $table->integer('ketua_nilai_penulisan')->nullable();
            $table->integer('ketua_nilai_hasil_akhir')->nullable();
            $table->integer('penguji1_nilai_sidang_presentasi')->nullable();
            $table->integer('penguji1_nilai_sidang_penguasaan_materi')->nullable();
            $table->integer('penguji1_nilai_sidang_penulisan')->nullable();
            $table->integer('penguji1_nilai_sidang_hasil_akhir')->nullable();
            $table->integer('penguji1_nilai_bimbingan_ketepatan')->nullable();
            $table->integer('penguji1_nilai_bimbingan_ketekunan_usaha')->nullable();
            $table->integer('penguji1_nilai_bimbingan_tingkah_laku')->nullable();
            $table->integer('penguji2_nilai_sidang_cara_menjawab')->nullable();
            $table->integer('penguji2_nilai_sidang_kecepatan_menjawab')->nullable();
            $table->integer('penguji2_nilai_sidang_ketepatan_menjawab')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai_sidang');
    }
}

