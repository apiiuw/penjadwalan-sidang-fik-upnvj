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
                    @php
                        // Ambil status validasi
                        $status = $dataMahasiswa->v_name;
                        $name = $dataMahasiswa->name;
                    @endphp

                    @if(!empty($name))
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Nomor Induk Mahasiswa (NIM)</label>
                    <input type="text" name="nim_nip" value="{{ auth()->user()->nim_nip }}" readonly required class="w-full border px-2 py-1 bg-gray-100 cursor-not-allowed" />
                    @php
                        // Ambil status validasi
                        $status = $dataMahasiswa->v_nim_nip;
                        $nim_nip = $dataMahasiswa->nim_nip;
                    @endphp

                    @if(!empty($nim_nip))
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Nomor Induk Kependudukan (NIK)</label>
                    <input type="text" name="nik" placeholder="Ketikkan Nomor Induk Kependudukan (NIK)" value="{{ $dataMahasiswa->nik }}" required class="w-full border px-2 py-1" />
                    @php
                        // Ambil status validasi
                        $status = $dataMahasiswa->v_nik;
                        $nik = $dataMahasiswa->nik;
                    @endphp

                    @if(!empty($nik))
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Email</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" readonly required class="w-full border px-2 py-1 bg-gray-100 cursor-not-allowed" />
                    @php
                        // Ambil status validasi
                        $status = $dataMahasiswa->v_email;
                        $email = $dataMahasiswa->email;
                    @endphp

                    @if(!empty($email))
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @endif             
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Program Studi</label>
                    <select disabled required name="program_studi" class="w-full border px-2 py-1 bg-gray-100 cursor-not-allowed">
                        <option {{ auth()->user()->program_studi == 'S1 Sistem Informasi' ? 'selected' : '' }}>S1 Sistem Informasi</option>
                        <option {{ auth()->user()->program_studi == 'D3 Sistem Informasi' ? 'selected' : '' }}>D3 Sistem Informasi</option>
                        <option {{ auth()->user()->program_studi == 'S1 Teknik Informatika' ? 'selected' : '' }}>S1 Teknik Informatika</option>
                        <option {{ auth()->user()->program_studi == 'S1 Data Analyst' ? 'selected' : '' }}>S1 Data Analyst</option>
                    </select>
                    @php
                        // Ambil status validasi
                        $status = $dataMahasiswa->v_program_studi;
                        $program_studi = $dataMahasiswa->program_studi;
                    @endphp

                    @if(!empty($program_studi))
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required class="w-full border px-2 py-1 bg-gray-100">
                        <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ $dataMahasiswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $dataMahasiswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @php
                        // Ambil status validasi
                        $status = $dataMahasiswa->v_jenis_kelamin;
                        $jenis_kelamin = $dataMahasiswa->jenis_kelamin;
                    @endphp

                    @if(!empty($jenis_kelamin))
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Tempat dan Tanggal Lahir</label>
                    <input type="text" name="tempat_tanggal_lahir" value="{{ $dataMahasiswa->tempat_tanggal_lahir }}" placeholder="Ketikkan Tempat dan Tanggal Lahir" class="w-full border px-2 py-1" required />
                    @php
                        // Ambil status validasi
                        $status = $dataMahasiswa->v_tempat_tanggal_lahir;
                        $tempat_tanggal_lahir = $dataMahasiswa->tempat_tanggal_lahir;
                    @endphp

                    @if(!empty($tempat_tanggal_lahir))
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Nomor Telepon/Whatsapp</label>
                    <input type="text" name="no_telp" value="{{ $dataMahasiswa->no_telp }}" placeholder="Ketikkan No Telepon/Whatsapp" class="w-full border px-2 py-1" required />
                    @php
                        // Ambil status validasi
                        $status = $dataMahasiswa->v_no_telp;
                        $no_telp = $dataMahasiswa->no_telp;
                    @endphp

                    @if(!empty($no_telp))
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Judul Skripsi/Tugas Akhir</label>
                    <input type="text" name="judul_skripsi_tugas_akhir" value="{{ $dataMahasiswa->judul_skripsi_tugas_akhir }}" placeholder="Ketikkan Judul Skripsi/Tugas Akhir" class="w-full border px-2 py-1" required />
                    @php
                        // Ambil status validasi
                        $status = $dataMahasiswa->v_judul_skripsi_tugas_akhir;
                        $judul_skripsi_tugas_akhir = $dataMahasiswa->judul_skripsi_tugas_akhir;
                    @endphp

                    @if(!empty($judul_skripsi_tugas_akhir))
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Tanggal Penyusunan</label>
                    <input type="date" name="tanggal_penyusunan" value="{{ $dataMahasiswa->tanggal_penyusunan }}" class="w-full border px-2 py-1" required />
                    @php
                        // Ambil status validasi
                        $status = $dataMahasiswa->v_tanggal_penyusunan;
                        $tanggal_penyusunan = $dataMahasiswa->tanggal_penyusunan;
                    @endphp

                    @if(!empty($tanggal_penyusunan))
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Dosen Pembimbing</label>
                    <select name="dosen_pembimbing" required class="w-full border px-2 py-1 bg-gray-100">
                        <option value="" disabled selected>-- Pilih Dosen Pembimbing --</option>
                        <option value="Dr. Widya Cholil, M.I.T." {{ $dataMahasiswa->dosen_pembimbing == 'Dr. Widya Cholil, M.I.T.' ? 'selected' : '' }}>Dr. Widya Cholil, M.I.T.</option>
                        <option value="Radinal Setyadinsa, S.Pd., M.T.I." {{ $dataMahasiswa->dosen_pembimbing == 'Radinal Setyadinsa, S.Pd., M.T.I.' ? 'selected' : '' }}>Radinal Setyadinsa, S.Pd., M.T.I.</option>
                        <option value="Jayanta, S.Kom., M.Si." {{ $dataMahasiswa->dosen_pembimbing == 'Jayanta, S.Kom., M.Si.' ? 'selected' : '' }}>Jayanta, S.Kom., M.Si.</option>
                        <option value="Muhammad Adrezo, S.Kom.,M.Sc." {{ $dataMahasiswa->dosen_pembimbing == 'Muhammad Adrezo, S.Kom.,M.Sc.' ? 'selected' : '' }}>Muhammad Adrezo, S.Kom.,M.Sc.</option>
                        <option value="Muhammad Panji Muslim, S.Pd., M.Kom." {{ $dataMahasiswa->dosen_pembimbing == 'Muhammad Panji Muslim, S.Pd., M.Kom.' ? 'selected' : '' }}>Muhammad Panji Muslim, S.Pd., M.Kom.</option>
                        <option value="Musthofa Galih Pradana, M.Kom." {{ $dataMahasiswa->dosen_pembimbing == 'Musthofa Galih Pradana, M.Kom.' ? 'selected' : '' }}>Musthofa Galih Pradana, M.Kom.</option>
                        <option value="Rudhy Ho Purabaya, SE., MMSI." {{ $dataMahasiswa->dosen_pembimbing == 'Rudhy Ho Purabaya, SE., MMSI.' ? 'selected' : '' }}>Rudhy Ho Purabaya, SE., MMSI.</option>
                        <option value="Artika Arista, S. Kom, MMSI." {{ $dataMahasiswa->dosen_pembimbing == 'Artika Arista, S. Kom, MMSI.' ? 'selected' : '' }}>Artika Arista, S. Kom, MMSI.</option>
                        <option value="Novi Trisman Hadi, S.Pd., M.Kom." {{ $dataMahasiswa->dosen_pembimbing == 'Novi Trisman Hadi, S.Pd., M.Kom.' ? 'selected' : '' }}>Novi Trisman Hadi, S.Pd., M.Kom.</option>
                        <option value="Tri Rahayu S.Kom., MM." {{ $dataMahasiswa->dosen_pembimbing == 'Tri Rahayu S.Kom., MM.' ? 'selected' : '' }}>Tri Rahayu S.Kom., MM.</option>
                        <option value="Bobby Suryo Prakoso S.T., M.Kom." {{ $dataMahasiswa->dosen_pembimbing == 'Bobby Suryo Prakoso S.T., M.Kom.' ? 'selected' : '' }}>Bobby Suryo Prakoso S.T., M.Kom.</option>
                        <option value="Helena Nurramdhani Irmanda, S.Pd, M.Kom." {{ $dataMahasiswa->dosen_pembimbing == 'Helena Nurramdhani Irmanda, S.Pd, M.Kom.' ? 'selected' : '' }}>Helena Nurramdhani Irmanda, S.Pd, M.Kom.</option>
                    </select>
                    @php
                        // Ambil status validasi
                        $status = $dataMahasiswa->v_dosen_pembimbing;
                        $dosen_pembimbing = $dataMahasiswa->dosen_pembimbing;
                    @endphp

                    @if(!empty($dosen_pembimbing))
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Link Video Youtube Presentasi Demo Proyek</label>
                    <input type="text" name="url_presentasi_video" value="{{ $dataMahasiswa->url_presentasi_video }}" placeholder="Ketikkan Link Video Youtube" class="w-full border px-2 py-1" required />
                    @php
                        // Ambil status validasi
                        $status = $dataMahasiswa->v_url_presentasi_video;
                        $url_presentasi_video = $dataMahasiswa->url_presentasi_video;
                    @endphp

                    @if(!empty($url_presentasi_video))
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @endif
                </div>
            </div>

            <!-- Kolom 2: Upload Berkas -->
            <div class="space-y-4">
                <div class="bg-gray-200 p-4 shadow border">
                    <label class="block font-semibold">Upload Buku Bimbingan</label>

                    @php
                        $status = $dataMahasiswa->v_buku_bimbingan; // Status validasi
                        $buku_bimbingan = $dataMahasiswa->buku_bimbingan; // File yang sudah ada
                    @endphp

                    <!-- Jika file sudah ada, tampilkan link untuk membuka file dan status validasi -->
                    @if($buku_bimbingan)
                        <a href="{{ asset($buku_bimbingan) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                            <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                            <span>Buku Bimbingan_{{ $dataMahasiswa->name }}_{{ $dataMahasiswa->nim_nip }}</span>
                        </a>

                        <!-- Status validasi -->
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                            <!-- Tombol untuk update file hanya jika status Ditolak -->
                            <div class="mt-4">
                                <label class="block font-semibold">Update Buku Bimbingan</label>
                                <input type="file" name="buku_bimbingan" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" />
                            </div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @else
                        <!-- Jika file belum ada, tampilkan pesan dan input untuk upload file baru -->
                        <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                        <div class="mt-4">
                            <label class="block font-semibold">Upload Buku Bimbingan</label>
                            <input type="file" name="buku_bimbingan" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" required />
                        </div>
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">File Scan KTP, KK, dan Akta Lahir</label>

                    @php
                        $status = $dataMahasiswa->v_ktp_kk_akta; // Status validasi
                        $ktp_kk_akta = $dataMahasiswa->ktp_kk_akta; // File yang sudah ada
                    @endphp

                    <!-- Jika file sudah ada, tampilkan link untuk membuka file dan status validasi -->
                    @if($ktp_kk_akta)
                        <a href="{{ asset($ktp_kk_akta) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                            <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                            <span>File KTP, KK, dan Akta Lahir_{{ $dataMahasiswa->name }}_{{ $dataMahasiswa->nim_nip }}</span>
                        </a>

                        <!-- Status validasi -->
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                            <!-- Tombol untuk update file hanya jika status Ditolak -->
                            <div class="mt-4">
                                <label class="block font-semibold">Update File KTP, KK, dan Akta Lahir</label>
                                <input type="file" name="ktp_kk_akta" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" required />
                            </div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @else
                        <!-- Jika file belum ada, tampilkan pesan dan input untuk upload file baru -->
                        <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                        <div class="mt-4">
                            <label class="block font-semibold">Upload File KTP, KK, dan Akta Lahir</label>
                            <!-- Hanya beri `required` jika file belum ada -->
                            <input type="file" name="ktp_kk_akta" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" 
                            @if(!$ktp_kk_akta) required @endif />
                        </div>
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Pas Foto Ijazah</label>

                    @php
                        $status = $dataMahasiswa->v_pas_foto_ijazah; // Status validasi
                        $pas_foto_ijazah = $dataMahasiswa->pas_foto_ijazah; // File yang sudah ada
                    @endphp

                    <!-- Jika file sudah ada, tampilkan link untuk membuka file dan status validasi -->
                    @if($pas_foto_ijazah)
                        <a href="{{ asset($pas_foto_ijazah) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                            <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                            <span>Pas Foto Ijazah_{{ $dataMahasiswa->name }}_{{ $dataMahasiswa->nim_nip }}</span>
                        </a>

                        <!-- Status validasi -->
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                            <!-- Tombol untuk update file hanya jika status Ditolak -->
                            <div class="mt-4">
                                <label class="block font-semibold">Update Pas Foto Ijazah</label>
                                <input type="file" name="pas_foto_ijazah" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" />
                            </div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @else
                        <!-- Jika file belum ada, tampilkan pesan dan input untuk upload file baru -->
                        <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                        <div class="mt-4">
                            <label class="block font-semibold">Upload Pas Foto Ijazah</label>
                            <input type="file" name="pas_foto_ijazah" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" required />
                        </div>
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Hasil Turnitin Maximal 25%</label>

                    @php
                        $status = $dataMahasiswa->v_hasil_turnitin; // Status validasi
                        $hasil_turnitin = $dataMahasiswa->hasil_turnitin; // File yang sudah ada
                    @endphp

                    <!-- Jika file sudah ada, tampilkan link untuk membuka file dan status validasi -->
                    @if($hasil_turnitin)
                        <a href="{{ asset($hasil_turnitin) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                            <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                            <span>Hasil Turnitin_{{ $dataMahasiswa->name }}_{{ $dataMahasiswa->nim_nip }}</span>
                        </a>

                        <!-- Status validasi -->
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                            <!-- Tombol untuk update file hanya jika status Ditolak -->
                            <div class="mt-4">
                                <label class="block font-semibold">Update Hasil Turnitin</label>
                                <input type="file" name="hasil_turnitin" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" />
                            </div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @else
                        <!-- Jika file belum ada, tampilkan pesan dan input untuk upload file baru -->
                        <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                        <div class="mt-4">
                            <label class="block font-semibold">Upload Hasil Turnitin</label>
                            <input type="file" name="hasil_turnitin" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" required />
                        </div>
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">File KHS dan KST</label>

                    @php
                        $status = $dataMahasiswa->v_khs_kst; // Status validasi
                        $khs_kst = $dataMahasiswa->khs_kst; // File yang sudah ada
                    @endphp

                    <!-- Jika file sudah ada, tampilkan link untuk membuka file dan status validasi -->
                    @if($khs_kst)
                        <a href="{{ asset($khs_kst) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                            <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                            <span>File KHS dan KST_{{ $dataMahasiswa->name }}_{{ $dataMahasiswa->nim_nip }}</span>
                        </a>

                        <!-- Status validasi -->
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                            <!-- Tombol untuk update file hanya jika status Ditolak -->
                            <div class="mt-4">
                                <label class="block font-semibold">Update File KHS dan KST</label>
                                <input type="file" name="khs_kst" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" />
                            </div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @else
                        <!-- Jika file belum ada, tampilkan pesan dan input untuk upload file baru -->
                        <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                        <div class="mt-4">
                            <label class="block font-semibold">Upload File KHS dan KST</label>
                            <input type="file" name="khs_kst" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" required />
                        </div>
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">File Scan Ijazah Terakhir</label>

                    @php
                        $status = $dataMahasiswa->v_ijazah_terakhir; // Status validasi
                        $ijazah_terakhir = $dataMahasiswa->ijazah_terakhir; // File yang sudah ada
                    @endphp

                    <!-- Jika file sudah ada, tampilkan link untuk membuka file dan status validasi -->
                    @if($ijazah_terakhir)
                        <a href="{{ asset($ijazah_terakhir) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                            <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                            <span>Ijazah Terakhir_{{ $dataMahasiswa->name }}_{{ $dataMahasiswa->nim_nip }}</span>
                        </a>

                        <!-- Status validasi -->
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                            <!-- Tombol untuk update file hanya jika status Ditolak -->
                            <div class="mt-4">
                                <label class="block font-semibold">Update File Ijazah Terakhir</label>
                                <input type="file" name="ijazah_terakhir" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" />
                            </div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @else
                        <!-- Jika file belum ada, tampilkan pesan dan input untuk upload file baru -->
                        <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                        <div class="mt-4">
                            <label class="block font-semibold">Upload File Ijazah Terakhir</label>
                            <input type="file" name="ijazah_terakhir" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" required />
                        </div>
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">File Scan Print Out Pembayaran</label>

                    @php
                        $status = $dataMahasiswa->v_print_out_pembayaran; // Status validasi
                        $print_out_pembayaran = $dataMahasiswa->print_out_pembayaran; // File yang sudah ada
                    @endphp

                    <!-- Jika file sudah ada, tampilkan link untuk membuka file dan status validasi -->
                    @if($print_out_pembayaran)
                        <a href="{{ asset($print_out_pembayaran) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                            <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                            <span>Print Out Pembayaran_{{ $dataMahasiswa->name }}_{{ $dataMahasiswa->nim_nip }}</span>
                        </a>

                        <!-- Status validasi -->
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                            <!-- Tombol untuk update file hanya jika status Ditolak -->
                            <div class="mt-4">
                                <label class="block font-semibold">Update File Print Out Pembayaran</label>
                                <input type="file" name="print_out_pembayaran" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" />
                            </div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @else
                        <!-- Jika file belum ada, tampilkan pesan dan input untuk upload file baru -->
                        <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                        <div class="mt-4">
                            <label class="block font-semibold">Upload File Print Out Pembayaran</label>
                            <input type="file" name="print_out_pembayaran" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" required />
                        </div>
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">File Scan Sertifikat TOEFL</label>

                    @php
                        $status = $dataMahasiswa->v_sertifikat_toefl; // Status validasi
                        $sertifikat_toefl = $dataMahasiswa->sertifikat_toefl; // File yang sudah ada
                    @endphp

                    <!-- Jika file sudah ada, tampilkan link untuk membuka file dan status validasi -->
                    @if($sertifikat_toefl)
                        <a href="{{ asset($sertifikat_toefl) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                            <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                            <span>Sertifikat TOEFL_{{ $dataMahasiswa->name }}_{{ $dataMahasiswa->nim_nip }}</span>
                        </a>

                        <!-- Status validasi -->
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                            <!-- Tombol untuk update file hanya jika status Ditolak -->
                            <div class="mt-4">
                                <label class="block font-semibold">Update Sertifikat TOEFL</label>
                                <input type="file" name="sertifikat_toefl" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" />
                            </div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @else
                        <!-- Jika file belum ada, tampilkan pesan dan input untuk upload file baru -->
                        <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                        <div class="mt-4">
                            <label class="block font-semibold">Upload Sertifikat TOEFL</label>
                            <input type="file" name="sertifikat_toefl" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" required />
                        </div>
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Sertifikat (Seminar/Webinar/Lomba)</label>

                    @php
                        $status = $dataMahasiswa->v_sertifikat_lainnya; // Status validasi
                        $sertifikat_lainnya = $dataMahasiswa->sertifikat_lainnya; // File yang sudah ada
                    @endphp

                    <!-- Jika file sudah ada, tampilkan link untuk membuka file dan status validasi -->
                    @if($sertifikat_lainnya)
                        <a href="{{ asset($sertifikat_lainnya) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                            <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                            <span>Sertifikat Lainnya_{{ $dataMahasiswa->name }}_{{ $dataMahasiswa->nim_nip }}</span>
                        </a>

                        <!-- Status validasi -->
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                            <!-- Tombol untuk update file hanya jika status Ditolak -->
                            <div class="mt-4">
                                <label class="block font-semibold">Update Sertifikat Lainnya</label>
                                <input type="file" name="sertifikat_lainnya" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" />
                            </div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @else
                        <!-- Jika file belum ada, tampilkan pesan dan input untuk upload file baru -->
                        <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                        <div class="mt-4">
                            <label class="block font-semibold">Upload Sertifikat Lainnya</label>
                            <input type="file" name="sertifikat_lainnya" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" required />
                        </div>
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Sertifikat Keahlian</label>

                    @php
                        $status = $dataMahasiswa->v_sertifikat_keahlian; // Status validasi
                        $sertifikat_keahlian = $dataMahasiswa->sertifikat_keahlian; // File yang sudah ada
                    @endphp

                    <!-- Jika file sudah ada, tampilkan link untuk membuka file dan status validasi -->
                    @if($sertifikat_keahlian)
                        <a href="{{ asset($sertifikat_keahlian) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                            <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                            <span>Sertifikat Keahlian_{{ $dataMahasiswa->name }}_{{ $dataMahasiswa->nim_nip }}</span>
                        </a>

                        <!-- Status validasi -->
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                            <!-- Tombol untuk update file hanya jika status Ditolak -->
                            <div class="mt-4">
                                <label class="block font-semibold">Update Sertifikat Keahlian</label>
                                <input type="file" name="sertifikat_keahlian" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" />
                            </div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @else
                        <!-- Jika file belum ada, tampilkan pesan dan input untuk upload file baru -->
                        <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                        <div class="mt-4">
                            <label class="block font-semibold">Upload Sertifikat Keahlian</label>
                            <input type="file" name="sertifikat_keahlian" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" required />
                        </div>
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Bukti PKM</label>

                    @php
                        $status = $dataMahasiswa->v_bukti_pkm; // Status validasi
                        $bukti_pkm = $dataMahasiswa->bukti_pkm; // File yang sudah ada
                    @endphp

                    <!-- Jika file sudah ada, tampilkan link untuk membuka file dan status validasi -->
                    @if($bukti_pkm)
                        <a href="{{ asset($bukti_pkm) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                            <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                            <span>Bukti PKM_{{ $dataMahasiswa->name }}_{{ $dataMahasiswa->nim_nip }}</span>
                        </a>

                        <!-- Status validasi -->
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                            <!-- Tombol untuk update file hanya jika status Ditolak -->
                            <div class="mt-4">
                                <label class="block font-semibold">Update Bukti PKM</label>
                                <input type="file" name="bukti_pkm" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" />
                            </div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @else
                        <!-- Jika file belum ada, tampilkan pesan dan input untuk upload file baru -->
                        <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                        <div class="mt-4">
                            <label class="block font-semibold">Upload Bukti PKM</label>
                            <input type="file" name="bukti_pkm" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" required />
                        </div>
                    @endif
                </div>

                <div class="bg-gray-200 p-4 shadow border min-h-[120px] flex flex-col justify-between">
                    <label class="block font-bold mb-1">Upload File Tugas Akhir/Skripsi</label>

                    @php
                        $status = $dataMahasiswa->v_penulisan_skripsi_tugas_akhir; // Status validasi
                        $penulisan_skripsi_tugas_akhir = $dataMahasiswa->penulisan_skripsi_tugas_akhir; // File yang sudah ada
                    @endphp

                    <!-- Jika file sudah ada, tampilkan link untuk membuka file dan status validasi -->
                    @if($penulisan_skripsi_tugas_akhir)
                        <a href="{{ asset($penulisan_skripsi_tugas_akhir) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                            <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                            <span>File Tugas Akhir/Skripsi_{{ $dataMahasiswa->name }}_{{ $dataMahasiswa->nim_nip }}</span>
                        </a>

                        <!-- Status validasi -->
                        @if($status === 'Belum Validasi')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                        @elseif($status === 'Ditolak')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                            <!-- Tombol untuk update file hanya jika status Ditolak -->
                            <div class="mt-4">
                                <label class="block font-semibold">Update File Tugas Akhir/Skripsi</label>
                                <input type="file" name="penulisan_skripsi_tugas_akhir" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" />
                            </div>
                        @elseif($status === 'Diterima')
                            <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                        @endif
                    @else
                        <!-- Jika file belum ada, tampilkan pesan dan input untuk upload file baru -->
                        <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                        <div class="mt-4">
                            <label class="block font-semibold">Upload File Tugas Akhir/Skripsi</label>
                            <input type="file" name="penulisan_skripsi_tugas_akhir" accept="application/pdf" class="w-full bg-white border px-2 py-0.5" required />
                        </div>
                    @endif
                </div>

            </div>

            <div class="col-span-1 md:col-span-2 flex justify-center mt-4">
                <!-- Cek status validasi untuk menentukan tombol yang ditampilkan -->
                @php
                    $hasRejectedFiles = false;
                    $hasNotValidatedFiles = true; // Asumsi awal bahwa ada file yang belum divalidasi

                    // Array dari status validasi
                    $validationStatuses = [
                        $dataMahasiswa->v_name,
                        $dataMahasiswa->v_nim_nip,
                        $dataMahasiswa->v_nik,
                        $dataMahasiswa->v_email,
                        $dataMahasiswa->v_program_studi,
                        $dataMahasiswa->v_jenis_kelamin,
                        $dataMahasiswa->v_tempat_tanggal_lahir,
                        $dataMahasiswa->v_no_telp,
                        $dataMahasiswa->v_judul_skripsi_tugas_akhir,
                        $dataMahasiswa->v_dosen_pembimbing,
                        $dataMahasiswa->v_buku_bimbingan,
                        $dataMahasiswa->v_ktp_kk_akta,
                        $dataMahasiswa->v_pas_foto_ijazah,
                        $dataMahasiswa->v_hasil_turnitin,
                        $dataMahasiswa->v_khs_kst,
                        $dataMahasiswa->v_ijazah_terakhir,
                        $dataMahasiswa->v_print_out_pembayaran,
                        $dataMahasiswa->v_sertifikat_toefl,
                        $dataMahasiswa->v_sertifikat_lainnya,
                        $dataMahasiswa->v_sertifikat_keahlian,
                        $dataMahasiswa->v_bukti_pkm,
                        $dataMahasiswa->v_penulisan_skripsi_tugas_akhir
                    ];

                    // Cek status validasi setiap file
                    $allAccepted = true;
                    foreach ($validationStatuses as $status) {
                        if ($status === 'Ditolak') {
                            $hasRejectedFiles = true;
                        }

                        if ($status !== 'Diterima') {
                            $allAccepted = false;
                        }
                    }
                @endphp

                <!-- Tombol Update jika ada file yang ditolak -->
                @if($hasRejectedFiles)
                    <button type="submit" name="action" value="update" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-6 border border-black shadow">
                        KIRIM PERUBAHAN
                    </button>
                <!-- Tombol Kirim jika semua status adalah 'Diterima' -->
                @elseif($allAccepted)
                    <div class="bg-green-500 text-black font-bold py-2 px-6 border border-black shadow">
                        SEMUA PERSYARATAN SUDAH DITERIMA
                    </div>
                <!-- Tombol Kirim jika ada file yang belum divalidasi -->
                @else
                    <button type="submit" name="action" value="kirim" class="bg-gray-200 hover:bg-gray-600 text-black font-bold py-2 px-6 border border-black shadow">
                        KIRIM
                    </button>
                @endif
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