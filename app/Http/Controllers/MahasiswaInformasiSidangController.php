<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranSidangMahasiswa;

class MahasiswaInformasiSidangController extends Controller
{
    public function index()
    {
        $programStudiCounts = [
            'D3 Sistem Informasi' => PendaftaranSidangMahasiswa::where('program_studi', 'D3 Sistem Informasi')->count(),
            'S1 Sistem Informasi' => PendaftaranSidangMahasiswa::where('program_studi', 'S1 Sistem Informasi')->count(),
            'S1 Informatika' => PendaftaranSidangMahasiswa::where('program_studi', 'S1 Informatika')->count(),
            'S1 Sains Data' => PendaftaranSidangMahasiswa::where('program_studi', 'S1 Sains Data')->count(),
        ];

        return view('user.pages.layanan.informasi-sidang', compact('programStudiCounts'));
    }
}
