<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalSidangMahasiswa;
use App\Models\NilaiSidang;
use Illuminate\Support\Facades\Mail;
use App\Mail\JadwalSidangDikirim;

class KoorProdiJadwalSidangMahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $data = JadwalSidangMahasiswa::query()
            ->when($search, function ($query, $search) {
                return $query->where('nim_nip', 'like', "%{$search}%")
                            ->orWhere('name', 'like', "%{$search}%");
            })
            ->get();

        return view('koor-prodi.pages.layanan.jadwal-sidang-mahasiswa.index', compact('data'));
    }

    public function input($id)
    {
        // Ambil data berdasarkan ID
        $mahasiswa = JadwalSidangMahasiswa::findOrFail($id);

        // Tampilkan view form input jadwal sidang
        return view('koor-prodi.pages.layanan.jadwal-sidang-mahasiswa.input-jadwal.index', compact('mahasiswa'));
    }

    public function kirim(Request $request, $id)
    {
        $request->validate([
            'ruang_pelaksanaan' => 'required|string|max:255',
            'gedung_pelaksanaan' => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'waktu_pelaksanaan' => 'required',
            'dosen_pembimbing_1' => 'required|string|max:255',
            'dosen_pembimbing_2' => 'required|string|max:255',
            'dosen_penguji_1' => 'required|string|max:255',
            'dosen_penguji_2' => 'required|string|max:255',
        ]);

        $mahasiswa = JadwalSidangMahasiswa::findOrFail($id);

        $mahasiswa->update([
            'ruang_pelaksanaan' => $request->ruang_pelaksanaan,
            'gedung_pelaksanaan' => $request->gedung_pelaksanaan,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'waktu_pelaksanaan' => $request->waktu_pelaksanaan,
            'dosen_pembimbing1' => $request->dosen_pembimbing_1,
            'dosen_pembimbing2' => $request->dosen_pembimbing_2,
            'dosen_penguji1' => $request->dosen_penguji_1,
            'dosen_penguji2' => $request->dosen_penguji_2,
        ]);

        // Cek apakah nim_nip sudah ada di tabel nilai_sidang
        $existingNilai = \App\Models\NilaiSidang::where('nim_nip', $mahasiswa->nim_nip)->first();

        if (!$existingNilai) {
            \App\Models\NilaiSidang::create([
                'name' => $mahasiswa->name,
                'nim_nip' => $mahasiswa->nim_nip,
                'email' => $mahasiswa->email,
                'program_studi' => $mahasiswa->program_studi,
            ]);
        }

        // Kirim email ke mahasiswa
        if ($mahasiswa->email) {
            Mail::to($mahasiswa->email)->send(new JadwalSidangDikirim($mahasiswa));
        }

        return redirect()->back()->with('success', 'Data berhasil dikirim.');
    }

}
