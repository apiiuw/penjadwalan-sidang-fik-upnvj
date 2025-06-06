<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PendaftaranSidangMahasiswa;
use App\Models\JadwalSidangMahasiswa;

class AdminDaftarSidangMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search'); // Ambil input pencarian dari URL (?search=...)

        $data = PendaftaranSidangMahasiswa::query()
            ->when($search, function ($query, $search) {
                return $query->where('nim_nip', 'like', "%{$search}%")
                            ->orWhere('name', 'like', "%{$search}%");
            })
            ->orderBy('tanggal_daftar', 'desc') // opsional: agar data terbaru di atas
            ->get();

        return view('admin.pages.layanan.daftar-data-dokumen-mahasiswa.index', compact('data'));
    }

    public function show($id)
    {
        $mahasiswa = PendaftaranSidangMahasiswa::findOrFail($id);

        return view('admin.pages.layanan.daftar-data-dokumen-mahasiswa.detail-berkas-mahasiswa.index', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        // Validasi awal
        $request->validate([
            'name' => 'required',
            'nim_nip' => 'required',
            'email' => 'required',
            'program_studi' => 'required',
        ]);

        // Cek apakah nim_nip sudah ada
        $exists = JadwalSidangMahasiswa::where('nim_nip', $request->nim_nip)->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Data sudah pernah dikirim.');
        }

        // Simpan data baru
        JadwalSidangMahasiswa::create([
            'name' => $request->name,
            'nim_nip' => $request->nim_nip,
            'email' => $request->email,
            'program_studi' => $request->program_studi,
        ]);

        return redirect()->back()->with('success', 'Data berhasil dikirim ke Koordinator Prodi.');
    }

}
