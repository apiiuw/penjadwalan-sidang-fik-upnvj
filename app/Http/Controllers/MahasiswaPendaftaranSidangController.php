<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\PendaftaranSidangMahasiswa;

class MahasiswaPendaftaranSidangController extends Controller
{
    // Fungsi untuk menampilkan data mahasiswa
    public function show()
    {
        $user = auth()->user();

        // Ambil data mahasiswa yang sudah ada di tabel pendaftaran_sidang_mahasiswa berdasarkan nim_nip
        $dataMahasiswa = PendaftaranSidangMahasiswa::where('nim_nip', $user->nim_nip)->first();

        // Jika data tidak ditemukan, redirect ke halaman sebelumnya
        if (!$dataMahasiswa) {
            return back()->withErrors(['nim_nip' => 'Data pendaftaran tidak ditemukan.'])->withInput();
        }

        // Kirim data ke view
        return view('user.pages.layanan.pendaftaran-sidang', compact('dataMahasiswa'));
    }

public function store(Request $request)
{
    $user = auth()->user();

    // Cek jika tombol "Update" atau "Kirim" yang ditekan
    if ($request->action == 'update') {
        return $this->updatePendaftaranSidang($request, $user);
    }

    return $this->createPendaftaranSidang($request, $user);
}

public function updatePendaftaranSidang(Request $request, $user)
{
    // Validasi dan proses update
    $request->validate([
        'name' => 'required|string|max:255',  // Validasi untuk name
        'nik' => 'required',
        'tempat_tanggal_lahir' => 'required',
        'judul_skripsi_tugas_akhir' => 'required',
        'tanggal_penyusunan' => 'required|date',
        'dosen_pembimbing' => 'required',
        'url_presentasi_video' => 'required|url',
        'buku_bimbingan' => 'file|mimes:pdf',
        'ktp_kk_akta' => $this->getFileValidationRule('ktp_kk_akta'),
        'pas_foto_ijazah' => $this->getFileValidationRule('pas_foto_ijazah'),
        'hasil_turnitin' => $this->getFileValidationRule('hasil_turnitin'),
        'khs_kst' => $this->getFileValidationRule('khs_kst'),
        'ijazah_terakhir' => $this->getFileValidationRule('ijazah_terakhir'),
        'print_out_pembayaran' => $this->getFileValidationRule('print_out_pembayaran'),
        'sertifikat_toefl' => $this->getFileValidationRule('sertifikat_toefl'),
        'sertifikat_lainnya' => $this->getFileValidationRule('sertifikat_lainnya'),
        'sertifikat_keahlian' => $this->getFileValidationRule('sertifikat_keahlian'),
        'penulisan_skripsi_tugas_akhir' => $this->getFileValidationRule('penulisan_skripsi_tugas_akhir'),
    ]);

    // Prepare updated data
    $data = $this->prepareData($request, $user);

    // Update data yang sudah ada
    DB::table('pendaftaran_sidang_mahasiswa')
        ->where('nim_nip', $user->nim_nip)
        ->update($data);

    // Update status validasi untuk kolom yang berubah
    $this->updateValidationStatus($request);

    return back()->with('success', 'Data berhasil diperbarui');
}

public function createPendaftaranSidang(Request $request, $user)
{
    // Validasi dan proses insert
    $request->validate([
        'name' => 'required|string|max:255',  // Menambahkan validasi untuk name
        'nik' => 'required',
        'tempat_tanggal_lahir' => 'required',
        'judul_skripsi_tugas_akhir' => 'required',
        'tanggal_penyusunan' => 'required|date',
        'dosen_pembimbing' => 'required',
        'url_presentasi_video' => 'required|url',
        'buku_bimbingan' => 'file|mimes:pdf',
        'ktp_kk_akta' => $this->getFileValidationRule('ktp_kk_akta'),
        'pas_foto_ijazah' => $this->getFileValidationRule('pas_foto_ijazah'),
        'hasil_turnitin' => $this->getFileValidationRule('hasil_turnitin'),
        'khs_kst' => $this->getFileValidationRule('khs_kst'),
        'ijazah_terakhir' => $this->getFileValidationRule('ijazah_terakhir'),
        'print_out_pembayaran' => $this->getFileValidationRule('print_out_pembayaran'),
        'sertifikat_toefl' => $this->getFileValidationRule('sertifikat_toefl'),
        'sertifikat_lainnya' => $this->getFileValidationRule('sertifikat_lainnya'),
        'sertifikat_keahlian' => $this->getFileValidationRule('sertifikat_keahlian'),
        'penulisan_skripsi_tugas_akhir' => $this->getFileValidationRule('penulisan_skripsi_tugas_akhir'),
    ]);

    $data = $this->prepareData($request, $user);

    // Insert data baru
    DB::table('pendaftaran_sidang_mahasiswa')->insert($data);

    // Update status validasi untuk kolom yang berubah
    $this->updateValidationStatus($request);

    return back()->with('success', 'Data berhasil disimpan');
}

public function prepareData(Request $request, $user)
{
    $namaUser = $user->name;
    $nim = $user->nim_nip;

    $data = [
        'name' => $request->name, // Menggunakan request->name untuk update
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

    return $data;
}

public function updateValidationStatus(Request $request)
{
    // Array untuk data yang baru saja di-update
    $updatedFields = [];

    // Cek data yang di-upload atau diubah dan tambahkan ke array
    $fields = [
        'name', 'nik', 'tempat_tanggal_lahir', 'judul_skripsi_tugas_akhir', 
        'tanggal_penyusunan', 'dosen_pembimbing', 'url_presentasi_video',
        'buku_bimbingan', 'ktp_kk_akta', 'pas_foto_ijazah', 'hasil_turnitin',
        'khs_kst', 'ijazah_terakhir', 'print_out_pembayaran', 'sertifikat_toefl',
        'sertifikat_lainnya', 'sertifikat_keahlian', 'penulisan_skripsi_tugas_akhir'
    ];

    foreach ($fields as $field) {
        if ($request->has($field)) {
            $updatedFields[] = $field;  // Menambahkan field yang diubah
        }
    }

    // Update status validasi hanya untuk field yang diubah
    if (!empty($updatedFields)) {
        $updateArray = [];
        foreach ($updatedFields as $field) {
            $updateArray['v_' . $field] = 'Belum Validasi'; // Status validasi diperbarui
        }

        DB::table('pendaftaran_sidang_mahasiswa')
            ->where('nim_nip', auth()->user()->nim_nip)
            ->update($updateArray);
    }
}

public function getFileValidationRule($field)
{
    // Cek apakah file sudah ada di database
    $existingFile = DB::table('pendaftaran_sidang_mahasiswa')
        ->where('nim_nip', auth()->user()->nim_nip)
        ->value($field);  // Mengambil file terkait field dari database

    // Jika file sudah ada, tidak perlu validasi `required`, hanya `file` saja
    if ($existingFile) {
        return 'file|mimes:pdf';
    }

    // Jika file belum ada, harus di-upload, maka `required` diterapkan
    return 'required|file|mimes:pdf';
}

}
