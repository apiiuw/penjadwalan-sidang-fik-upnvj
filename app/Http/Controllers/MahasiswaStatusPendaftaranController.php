<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalSidangMahasiswa;

class MahasiswaStatusPendaftaranController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Mengambil user yang login

        $data = JadwalSidangMahasiswa::where('nim_nip', $user->nim_nip)->first();

        return view('user.pages.layanan.status-dan-hasil-pendaftaran', compact('data', 'user'));
    }
}
