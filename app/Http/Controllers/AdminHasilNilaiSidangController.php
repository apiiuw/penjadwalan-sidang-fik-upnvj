<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiSidang;
use Illuminate\Support\Facades\Mail;
use App\Mail\NilaiSidangUpdatedMail;

class AdminHasilNilaiSidangController extends Controller
{
    public function index(Request $request)
    {
        $query = NilaiSidang::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nim_nip', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%");
            });
        }

        $dataSidang = $query->orderByDesc('tanggal_pelaksanaan')->get(); // atau ->paginate(

        return view('admin.pages.layanan.hasil-dan-nilai-sidang-mahasiswa.index', compact('dataSidang'));
    }

    public function formInput($id)
    {
        $mahasiswa = NilaiSidang::findOrFail($id);
        return view('admin.pages.layanan.hasil-dan-nilai-sidang-mahasiswa.input-nilai.index', compact('mahasiswa'));
    }

    public function store(Request $request, $id)
    {
        // Validasi input nilai
        $request->validate([
            'ketua_nilai_presentasi' => 'required|numeric',
            'ketua_nilai_penguasaan_materi' => 'required|numeric',
            'ketua_nilai_penulisan' => 'required|numeric',
            'ketua_nilai_hasil_akhir' => 'required|numeric',
            'penguji1_nilai_sidang_presentasi' => 'required|numeric',
            'penguji1_nilai_sidang_penguasaan_materi' => 'required|numeric',
            'penguji1_nilai_sidang_penulisan' => 'required|numeric',
            'penguji1_nilai_sidang_hasil_akhir' => 'required|numeric',
            'penguji1_nilai_bimbingan_ketepatan' => 'required|numeric',
            'penguji1_nilai_bimbingan_ketekunan_usaha' => 'required|numeric',
            // Tambahkan validasi lain jika diperlukan
        ]);

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
