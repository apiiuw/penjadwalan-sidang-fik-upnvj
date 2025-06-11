<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSidangMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_sidang_mahasiswa';

    protected $fillable = [
        'nim_nip', 'nama_lengkap', 'tanggal_daftar', 'dosen_pembimbing', // sesuaikan dengan kolom sebenarnya
    ];
}
