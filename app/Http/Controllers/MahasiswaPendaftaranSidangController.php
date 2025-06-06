<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MahasiswaPendaftaranSidangController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        // Cek apakah nim_nip sudah pernah digunakan
        $existing = DB::table('pendaftaran_sidang_mahasiswa')
            ->where('nim_nip', $user->nim_nip)
            ->first();

        if ($existing) {
            return back()->withErrors(['nim_nip' => 'Gagal upload berkas, Data anda sudah terdaftar sebelumnya.'])->withInput();
        }

        $request->validate([
            'nik' => 'required',
            'tempat_tanggal_lahir' => 'required',
            'judul_skripsi_tugas_akhir' => 'required',
            'tanggal_penyusunan' => 'required|date',
            'dosen_pembimbing' => 'required',
            'url_presentasi_video' => 'required|url',
            'buku_bimbingan' => 'file|mimes:pdf',
            'ktp_kk_akta' => 'required|file',
            'pas_foto_ijazah' => 'required|file',
            'hasil_turnitin' => 'required|file',
            'khs_kst' => 'required|file',
            'ijazah_terakhir' => 'required|file',
            'print_out_pembayaran' => 'required|file',
            'sertifikat_toefl' => 'required|file',
            'sertifikat_lainnya' => 'required|file',
            'sertifikat_keahlian' => 'required|file',
            'penulisan_skripsi_tugas_akhir' => 'required|file',
        ]);

        $namaUser = $user->name;
        $nim = $user->nim_nip;

        $data = [
            'name' => $namaUser,
            'nim_nip' => $nim,
            'nik' => $request->nik,
            'email' => $user->email,
            'program_studi' => $user->program_studi,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
            'no_telp' => $request->no_telp,
            'judul_skripsi_tugas_akhir' => $request->judul_skripsi_tugas_akhir,
            'tanggal_penyusunan' => $request->tanggal_penyusunan,
            'dosen_pembimbing' => $request->dosen_pembimbing,
            'url_presentasi_video' => $request->url_presentasi_video,
            'tanggal_daftar' => now()->format('d/m/Y'),
        ];

        $fields = [
            'buku_bimbingan', 'ktp_kk_akta', 'pas_foto_ijazah', 'hasil_turnitin',
            'khs_kst', 'ijazah_terakhir', 'print_out_pembayaran', 'sertifikat_toefl',
            'sertifikat_lainnya', 'sertifikat_keahlian', 'penulisan_skripsi_tugas_akhir', 'bukti_pkm'
        ];

        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                $ext = $request->file($field)->getClientOriginalExtension();
                $namaFile = str_replace('_', ' ', ucfirst($field)) . "_{$namaUser}_{$nim}." . $ext;
                $path = "img/data-daftar-sidang/" . str_replace('_', '-', $field);
                $request->file($field)->move(public_path($path), $namaFile);
                $data[$field] = "$path/$namaFile";
            }
        }

        DB::table('pendaftaran_sidang_mahasiswa')->insert($data);

        return back()->with('success', 'Data berhasil disimpan');
    }

}
