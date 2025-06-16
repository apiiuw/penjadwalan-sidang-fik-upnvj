<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\NilaiSidang;
use Illuminate\Support\Facades\Mail;
use App\Mail\NilaiSidangUpdatedMail;

class PembimbingNilaiSidangController extends Controller
{
    public function index(Request $request)
    {
        $query = NilaiSidang::query();

        // Filter berdasarkan dosen pembimbing yang sedang login
        $query->where('pembimbing_1', Auth::user()->name);

        // Filter pencarian jika ada
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nim_nip', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%");
            });
        }

        $dataSidang = $query->orderByDesc('tanggal_pelaksanaan')->get();

        return view('pembimbing.pages.layanan.nilai-sidang-mahasiswa.index', compact('dataSidang'));
    }
    public function formInput($id)
    {
        $mahasiswa = NilaiSidang::findOrFail($id);

        if (Auth::user()->name === $mahasiswa->pembimbing_1) {
            $peranPembimbing = 'pembimbing_1';
        } elseif (Auth::user()->name === $mahasiswa->pembimbing_2) {
            $peranPembimbing = 'pembimbing_2';
        } else {
            $peranPembimbing = 'lainnya';
        }

        return view('pembimbing.pages.layanan.nilai-sidang-mahasiswa.input-nilai.index', compact('mahasiswa', 'peranPembimbing'));
    }

    public function store(Request $request, $id)
    {
        // Ambil data nilai yang akan diupdate
        $dataNilai = $request->only([
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
        ]);

        // Update langsung berdasarkan mahasiswa_id
        NilaiSidang::where('id', $id)->update($dataNilai);

        $nilai = NilaiSidang::find($id);
        if ($nilai && $nilai->email) {
            Mail::to($nilai->email)->send(new NilaiSidangUpdatedMail($nilai));
        }

        return redirect()->back()->with('success', 'Nilai berhasil diperbarui.');
    }

}
