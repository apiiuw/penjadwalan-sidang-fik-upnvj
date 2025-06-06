<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSidangMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_sidang_mahasiswa';

    protected $fillable = [
        'nim', 'nama_lengkap', 'tanggal_daftar', // sesuaikan dengan kolom sebenarnya
    ];
}
