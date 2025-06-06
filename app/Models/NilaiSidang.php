<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiSidang extends Model
{
    protected $table = 'nilai_sidang';

    protected $fillable = [
        'name',
        'nim_nip',
        'email',
        'program_studi',
        'tanggal_pelaksanaan',
        'ketua_nilai_presentasi',
        'ketua_nilai_penguasaan_materi',
        'ketua_nilai_penulisan',
        'ketua_nilai_hasil_akhir',
        'penguji1_nilai_sidang_presentasi',
        'penguji1_nilai_sidang_penguasaan_materi',
        'penguji1_nilai_sidang_penulisan',
        'penguji1_nilai_sidang_hasil_akhir',
        'penguji1_nilai_bimbingan_ketepatan',
        'penguji1_nilai_bimbingan_ketekunan_usaha',
        'penguji1_nilai_bimbingan_tingkah_laku',
        'penguji2_nilai_sidang_cara_menjawab',
        'penguji2_nilai_sidang_kecepatan_menjawab',
        'penguji2_nilai_sidang_ketepatan_menjawab',
    ];
}
