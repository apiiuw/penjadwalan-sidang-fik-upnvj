@extends('user.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="my-20">
        <h1 class=" uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Pendaftaran Sidang</h1>

    <div class="max-w-6xl mx-auto p-6">

        <form action="{{ route('pendaftaran-sidang.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf

            <!-- Kolom 1: Data Mahasiswa -->
            <div class="space-y-4">
                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}" readonly required class="w-full border px-2 py-1 bg-gray-100 cursor-not-allowed" />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Nomor Induk Mahasiswa (NIM)</label>
                    <input type="text" name="nim_nip" value="{{ auth()->user()->nim_nip }}" readonly required class="w-full border px-2 py-1 bg-gray-100 cursor-not-allowed" />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Nomor Induk Kependudukan (NIK)</label>
                    <input type="text" name="nik" placeholder="Ketikkan Nomor Induk Kependudukan (NIK)" required class="w-full border px-2 py-1" />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Email</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" readonly required class="w-full border px-2 py-1 bg-gray-100 cursor-not-allowed" />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Program Studi</label>
                    <select disabled required name="program_studi" class="w-full border px-2 py-1 bg-gray-100 cursor-not-allowed">
                        <option {{ auth()->user()->program_studi == 'S1 Sistem Informasi' ? 'selected' : '' }}>S1 Sistem Informasi</option>
                        <option {{ auth()->user()->program_studi == 'D3 Sistem Informasi' ? 'selected' : '' }}>D3 Sistem Informasi</option>
                        <option {{ auth()->user()->program_studi == 'S1 Teknik Informatika' ? 'selected' : '' }}>S1 Teknik Informatika</option>
                        <option {{ auth()->user()->program_studi == 'S1 Data Analyst' ? 'selected' : '' }}>S1 Data Analyst</option>
                    </select>
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required class="w-full border px-2 py-1 bg-gray-100">
                        <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Tempat dan Tanggal Lahir</label>
                    <input type="text" name="tempat_tanggal_lahir" placeholder="Ketikkan Tempat dan Tanggal Lahir" class="w-full border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Nomor Telepon/Whatsapp</label>
                    <input type="text" name="no_telp" placeholder="Ketikkan No Telepon/Whatsapp" class="w-full border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Judul Skripsi/Tugas Akhir</label>
                    <input type="text" name="judul_skripsi_tugas_akhir" placeholder="Ketikkan Judul Skripsi/Tugas Akhir" class="w-full border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Tanggal Penyusunan</label>
                    <input type="date" name="tanggal_penyusunan" class="w-full border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Dosen Pembimbing</label>
                    <input type="text" name="dosen_pembimbing" placeholder="Ketikkan Dosen Pembimbing" class="w-full border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Link Video Youtube Presentasi Demo Proyek</label>
                    <input type="text" name="url_presentasi_video" placeholder="Ketikkan Link Video Youtube" class="w-full border px-2 py-1" required />
                </div>
            </div>

            <!-- Kolom 2: Upload Berkas -->
            <div class="space-y-4">
                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Buku Bimbingan Tugas Akhir/Skripsi</label>
                    <input type="file" name="buku_bimbingan" accept="application/pdf" class="w-full bg-white border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">File Scan KTP, KK, dan Akta Lahir</label>
                    <input type="file" name="ktp_kk_akta" accept="application/pdf" class="w-full bg-white border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Pas Foto Ijazah</label>
                    <input type="file" name="pas_foto_ijazah" accept="application/pdf" class="w-full bg-white border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Hasil Turnitin Maximal 25%</label>
                    <input type="file" name="hasil_turnitin" accept="application/pdf" class="w-full bg-white border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">File KHS dan KST</label>
                    <input type="file" name="khs_kst" accept="application/pdf" class="w-full bg-white border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">File Scan Ijazah Terakhir</label>
                    <input type="file" name="ijazah_terakhir" accept="application/pdf" class="w-full bg-white border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">File Scan Print Out Pembayaran</label>
                    <input type="file" name="print_out_pembayaran" accept="application/pdf" class="w-full bg-white border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">File Scan Sertifikat TOEFL</label>
                    <input type="file" name="sertifikat_toefl" accept="application/pdf" class="w-full bg-white border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Sertifikat (Seminar/Webinar/Lomba)</label>
                    <input type="file" name="sertifikat_lainnya" accept="application/pdf" class="w-full bg-white border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Sertifikat Keahlian</label>
                    <input type="file" name="sertifikat_keahlian" accept="application/pdf" class="w-full bg-white border px-2 py-1" required />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Bukti PKM</label>
                    <input type="file" name="bukti_pkm" accept="application/pdf" class="w-full bg-white border px-2 py-1" />
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Upload File Tugas Akhir/Skripsi</label>
                    <input type="file" name="penulisan_skripsi_tugas_akhir" accept="application/pdf" class="w-full bg-white border px-2 py-1" required />
                </div>
            </div>

            <!-- Tombol Kirim (letakkan di bawah, spanning 2 kolom) -->
            <div class="col-span-1 md:col-span-2 flex justify-end mt-4">
                <button type="submit" class="bg-gray-200 hover:bg-gray-600 text-black font-bold py-2 px-6 border border-black shadow">
                    KIRIM
                </button>
            </div>
        </form>
    </div>

    </div>

</div>

{{-- Toast --}}
<div class="fixed top-4 right-4 z-50">
    @if (session('success'))
        <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
</div>

<div class="fixed top-4 right-4 z-50">
    @if ($errors->any())
    <div id="toast-warning" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
            </svg>
            <span class="sr-only">Warning icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif
</div>

@endsection