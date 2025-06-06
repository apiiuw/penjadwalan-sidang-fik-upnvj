<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSidangMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'jadwal_sidang_mahasiswa';

    protected $fillable = [
        'name',
        'nim_nip',
        'email',
        'program_studi',
        'ruang_pelaksanaan',
        'gedung_pelaksanaan',
        'tanggal_pelaksanaan',
        'waktu_pelaksanaan',
        'dosen_pembimbing1',
        'dosen_pembimbing2',
        'dosen_penguji1',
        'dosen_penguji2',
    ];
}
