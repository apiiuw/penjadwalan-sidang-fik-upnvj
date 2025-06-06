<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pendaftaran_sidang_mahasiswa', function (Blueprint $table) {
            $table->string('tanggal_daftar')->after('url_presentasi_video');
        });
    }

    public function down()
    {
        Schema::table('pendaftaran_sidang_mahasiswa', function (Blueprint $table) {
            $table->dropColumn('tanggal_daftar');
        });
    }

};
