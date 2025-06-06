<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NilaiSidang;

class MahasiswaHasilSidangController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $nilaiSidang = NilaiSidang::where('nim_nip', $user->nim_nip)->first();

        return view('user.pages.layanan.hasil-dan-nilai-sidang', compact('nilaiSidang', 'user'));
    }
}
