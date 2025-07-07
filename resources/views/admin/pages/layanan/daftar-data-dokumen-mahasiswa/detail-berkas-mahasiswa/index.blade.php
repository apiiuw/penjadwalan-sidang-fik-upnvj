@extends('admin.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="my-20">

      <h1 class=" uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Detail Berkas Mahasiswa</h1>

      <div class="p-6 px-10 bg-white">
        <div class="grid grid-cols-2 gap-6">
          
          <!-- Kolom Kiri -->
          <div>
            <h2 class="font-bold text-center mb-4">DATA MAHASISWA</h2>

            <div class="space-y-4">
              <div>
                  <label class="block font-semibold">Nama</label>
                  <input type="text" value="{{ $mahasiswa->name }}" class="w-full border p-2 bg-gray-100 rounded" disabled />
                  
                  @php
                      $status = $mahasiswa->v_name;
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('name', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('name', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('name', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Nomor Induk Kependudukan</label>
                  <input type="text" value="{{ $mahasiswa->nik }}" class="w-full border p-2 bg-gray-100 rounded" disabled />
                  
                  @php
                      $status = $mahasiswa->v_nik; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('nik', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('nik', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('nik', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">NIM</label>
                  <input type="text" value="{{ $mahasiswa->nim_nip }}" class="w-full border p-2 bg-gray-100 rounded" disabled />
                  
                  @php
                      $status = $mahasiswa->v_nim_nip; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('nim_nip', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('nim_nip', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('nim_nip', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Program Studi</label>
                  <input type="text" value="{{ $mahasiswa->program_studi }}" class="w-full border p-2 bg-gray-100 rounded" disabled />
                  
                  @php
                      $status = $mahasiswa->v_program_studi; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('program_studi', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('program_studi', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('program_studi', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Tempat/Tanggal Lahir</label>
                  <input type="text" value="{{ $mahasiswa->tempat_tanggal_lahir }}" class="w-full border p-2 bg-gray-100 rounded" disabled />
                  
                  @php
                      $status = $mahasiswa->v_tempat_tanggal_lahir; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('tempat_tanggal_lahir', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('tempat_tanggal_lahir', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('tempat_tanggal_lahir', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Jenis Kelamin</label>
                  <input type="text" value="{{ $mahasiswa->jenis_kelamin }}" class="w-full border p-2 bg-gray-100 rounded" disabled />
                  
                  @php
                      $status = $mahasiswa->v_jenis_kelamin; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('jenis_kelamin', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('jenis_kelamin', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('jenis_kelamin', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Judul Skripsi/Tugas Akhir</label>
                  <input type="text" value="{{ $mahasiswa->judul_skripsi_tugas_akhir }}" class="w-full border p-2 bg-gray-100 rounded" disabled />
                  
                  @php
                      $status = $mahasiswa->v_judul_skripsi_tugas_akhir; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('judul_skripsi_tugas_akhir', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('judul_skripsi_tugas_akhir', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('judul_skripsi_tugas_akhir', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Dosen Pembimbing</label>
                  <input type="text" value="{{ $mahasiswa->dosen_pembimbing }}" class="w-full border p-2 bg-gray-100 rounded" disabled />
                  
                  @php
                      $status = $mahasiswa->v_dosen_pembimbing; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('dosen_pembimbing', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('dosen_pembimbing', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('dosen_pembimbing', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">No Telp/WA</label>
                  <input type="text" value="{{ $mahasiswa->no_telp }}" class="w-full border p-2 bg-gray-100 rounded" disabled />
                  
                  @php
                      $status = $mahasiswa->v_no_telp; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('no_telp', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('no_telp', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('no_telp', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Email</label>
                  <input type="text" value="{{ $mahasiswa->email }}" class="w-full border p-2 bg-gray-100 rounded" disabled />
                  
                  @php
                      $status = $mahasiswa->v_email; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('email', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('email', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('email', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Link Video Presentasi</label>
                  @if($mahasiswa->url_presentasi_video)
                    <a href="{{ $mahasiswa->url_presentasi_video }}" target="_blank" class="w-full border p-2 bg-gray-100 rounded inline-block text-black border-black hover:underline">
                      {{ $mahasiswa->url_presentasi_video }}
                    </a>
                  @else
                    <div class="w-full border p-2 bg-gray-100 rounded inline-block text-black border-black">Belum ada link</div>
                  @endif
                  
                  @php
                      $status = $mahasiswa->v_url_presentasi_video; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('url_presentasi_video', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('url_presentasi_video', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('url_presentasi_video', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

            </div>
          </div>

          <!-- Kolom Kanan -->
          <div>
            <h2 class="font-bold text-center mb-4">DOKUMEN MAHASISWA</h2>

            <div class="space-y-4">

              <div>
                  <label class="block font-semibold">Buku Bimbingan</label>
                  @if($mahasiswa->buku_bimbingan)
                    <a href="{{ asset($mahasiswa->buku_bimbingan) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                      <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                      <span>Buku Bimbingan_{{ $mahasiswa->name }}_{{ $mahasiswa->nim_nip }}</span>
                    </a>
                  @else
                    <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                  @endif
                  
                  @php
                      $status = $mahasiswa->v_buku_bimbingan; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('buku_bimbingan', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('buku_bimbingan', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('buku_bimbingan', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">File Scan KTP, KK, Akta Lahir dan KTM</label>
                  @if($mahasiswa->ktp_kk_akta)
                    <a href="{{ asset($mahasiswa->ktp_kk_akta) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                      <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                      <span>KTP_KK_Akta_{{ $mahasiswa->name }}_{{ $mahasiswa->nim_nip }}</span>
                    </a>
                  @else
                    <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                  @endif
                  
                  @php
                      $status = $mahasiswa->v_ktp_kk_akta; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('ktp_kk_akta', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('ktp_kk_akta', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('ktp_kk_akta', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Pas Foto Ijazah</label>
                  @if($mahasiswa->pas_foto_ijazah)
                    <a href="{{ asset($mahasiswa->pas_foto_ijazah) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                      <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                      <span>Pas_Foto_Ijazah_{{ $mahasiswa->name }}_{{ $mahasiswa->nim_nip }}</span>
                    </a>
                  @else
                    <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                  @endif
                  
                  @php
                      $status = $mahasiswa->v_pas_foto_ijazah; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('pas_foto_ijazah', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('pas_foto_ijazah', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('pas_foto_ijazah', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Hasil Turnitin 25%</label>
                  @if($mahasiswa->hasil_turnitin)
                    <a href="{{ asset($mahasiswa->hasil_turnitin) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                      <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                      <span>Hasil_Turnitin_{{ $mahasiswa->name }}_{{ $mahasiswa->nim_nip }}</span>
                    </a>
                  @else
                    <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                  @endif
                  
                  @php
                      $status = $mahasiswa->v_hasil_turnitin; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('hasil_turnitin', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('hasil_turnitin', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('hasil_turnitin', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">File KHS dan KST</label>
                  @if($mahasiswa->khs_kst)
                    <a href="{{ asset($mahasiswa->khs_kst) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                      <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                      <span>KHS_KST_{{ $mahasiswa->name }}_{{ $mahasiswa->nim_nip }}</span>
                    </a>
                  @else
                    <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                  @endif
                  
                  @php
                      $status = $mahasiswa->v_khs_kst; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('khs_kst', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('khs_kst', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('khs_kst', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Ijazah Terakhir</label>
                  @if($mahasiswa->ijazah_terakhir)
                    <a href="{{ asset($mahasiswa->ijazah_terakhir) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                      <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                      <span>Ijazah_Terakhir_{{ $mahasiswa->name }}_{{ $mahasiswa->nim_nip }}</span>
                    </a>
                  @else
                    <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                  @endif
                  
                  @php
                      $status = $mahasiswa->v_ijazah_terakhir; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('ijazah_terakhir', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('ijazah_terakhir', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('ijazah_terakhir', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Print Out Pembayaran</label>
                  @if($mahasiswa->print_out_pembayaran)
                    <a href="{{ asset($mahasiswa->print_out_pembayaran) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                      <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                      <span>Print_Out_Pembayaran_{{ $mahasiswa->name }}_{{ $mahasiswa->nim_nip }}</span>
                    </a>
                  @else
                    <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                  @endif
                  
                  @php
                      $status = $mahasiswa->v_print_out_pembayaran; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('print_out_pembayaran', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('print_out_pembayaran', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('print_out_pembayaran', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Sertifikat TOEFL</label>
                  @if($mahasiswa->sertifikat_toefl)
                    <a href="{{ asset($mahasiswa->sertifikat_toefl) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                      <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                      <span>Sertifikat_TOEFL_{{ $mahasiswa->name }}_{{ $mahasiswa->nim_nip }}</span>
                    </a>
                  @else
                    <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                  @endif
                  
                  @php
                      $status = $mahasiswa->v_sertifikat_toefl; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('sertifikat_toefl', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('sertifikat_toefl', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('sertifikat_toefl', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Sertifikat Keahlian</label>
                  @if($mahasiswa->sertifikat_keahlian)
                    <a href="{{ asset($mahasiswa->sertifikat_keahlian) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                      <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                      <span>Sertifikat_Keahlian_{{ $mahasiswa->name }}_{{ $mahasiswa->nim_nip }}</span>
                    </a>
                  @else
                    <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                  @endif
                  
                  @php
                      $status = $mahasiswa->v_sertifikat_keahlian; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('sertifikat_keahlian', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('sertifikat_keahlian', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('sertifikat_keahlian', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Sertifikat Seminar/Webinar/Lomba</label>
                  @if($mahasiswa->sertifikat_lainnya)
                    <a href="{{ asset($mahasiswa->sertifikat_lainnya) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                      <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                      <span>Sertifikat_Lainnya_{{ $mahasiswa->name }}_{{ $mahasiswa->nim_nip }}</span>
                    </a>
                  @else
                    <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                  @endif
                  
                  @php
                      $status = $mahasiswa->v_sertifikat_lainnya; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('sertifikat_lainnya', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('sertifikat_lainnya', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('sertifikat_lainnya', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">Bukti PKM</label>
                  @if($mahasiswa->bukti_pkm)
                    <a href="{{ asset($mahasiswa->bukti_pkm) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                      <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                      <span>Bukti PKM_{{ $mahasiswa->name }}_{{ $mahasiswa->nim_nip }}</span>
                    </a>
                  @else
                    <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                  @endif
                  
                  @php
                      $status = $mahasiswa->v_bukti_pkm; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('bukti_pkm', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('bukti_pkm', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('bukti_pkm', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

              <div>
                  <label class="block font-semibold">File Skripsi/Tugas Akhir</label>
                  @if($mahasiswa->penulisan_skripsi_tugas_akhir)
                    <a href="{{ asset($mahasiswa->penulisan_skripsi_tugas_akhir) }}" target="_blank" class="w-full border border-black p-2 bg-gray-100 rounded flex items-center space-x-2 text-black hover:bg-gray-200 transition">
                      <span><i class="fa-solid fa-file-pdf text-red-500"></i></span>
                      <span>Skripsi_Tugas_Akhir_{{ $mahasiswa->name }}_{{ $mahasiswa->nim_nip }}</span>
                    </a>
                  @else
                    <div class="w-full border border-black p-2 bg-gray-100 rounded text-gray-500">Belum ada file</div>
                  @endif
                  
                  @php
                      $status = $mahasiswa->v_penulisan_skripsi_tugas_akhir; 
                  @endphp

                  @if($status === 'Belum Validasi')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-yellow-500">Belum Validasi</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('penulisan_skripsi_tugas_akhir', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Ditolak')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-red-500">Ditolak</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('penulisan_skripsi_tugas_akhir', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @elseif($status === 'Diterima')
                      <div class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-full text-center bg-green-500">Diterima</div>
                      <div class="w-full justify-center flex">
                        <button class="text-black text-sm mt-2 px-2 py-1 font-bold border border-black w-1/2 text-center bg-gray-300 hover:bg-gray-400" onclick="openModal('penulisan_skripsi_tugas_akhir', '{{ $mahasiswa->nim_nip }}', '{{ $status }}')">Update Status</button>
                      </div>
                  @endif
              </div>

            </div>
          </div>
        </div>
      </div>

      @php
          $statusColumns = [
              'v_name', 'v_nim_nip', 'v_nik', 'v_email', 'v_program_studi', 'v_jenis_kelamin',
              'v_tempat_tanggal_lahir', 'v_no_telp', 'v_judul_skripsi_tugas_akhir', 
               'v_dosen_pembimbing', 'v_url_presentasi_video', 'v_bukti_pkm',
              'v_buku_bimbingan', 'v_ktp_kk_akta', 'v_pas_foto_ijazah', 'v_hasil_turnitin', 
              'v_khs_kst', 'v_ijazah_terakhir', 'v_print_out_pembayaran', 'v_sertifikat_toefl', 
              'v_sertifikat_lainnya', 'v_sertifikat_keahlian', 'v_penulisan_skripsi_tugas_akhir'
          ];

          $allAccepted = true;

          foreach ($statusColumns as $column) {
              if ($mahasiswa->$column !== 'Diterima') {
                  $allAccepted = false;
                  break;
              }
          }
      @endphp

      @if($allAccepted)
          <div class="text-center mt-10">
              <button onclick="showConfirmation()" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">
                  Kirim ke Koor Prodi
              </button>
          </div>
      @endif

      <div id="confirmationModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
          <div class="bg-white p-6 rounded shadow-lg text-center w-96">
              <h2 class="text-lg font-bold mb-4">Kirim ke Koor Prodi?</h2>
              <form method="POST" action="{{ route('kirim.ke.koor', ['id' => $mahasiswa->id]) }}">
                  @csrf
                  <input type="hidden" name="name" value="{{ $mahasiswa->name }}">
                  <input type="hidden" name="nim_nip" value="{{ $mahasiswa->nim_nip }}">
                  <input type="hidden" name="email" value="{{ $mahasiswa->email }}">
                  <input type="hidden" name="program_studi" value="{{ $mahasiswa->program_studi }}">

                  <div class="flex justify-center gap-4">
                      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kirim</button>
                      <button type="button" onclick="hideConfirmation()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</button>
                  </div>
              </form>
          </div>
      </div>

      <script>
        function showConfirmation() {
          document.getElementById('confirmationModal').classList.remove('hidden');
        }

        function hideConfirmation() {
          document.getElementById('confirmationModal').classList.add('hidden');
        }
      </script>

    </div>

    </div>

</div>

<div id="updateModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-8 rounded shadow-lg w-96">
        <h3 class="font-bold mb-4">Update Status</h3>
        <form action="{{ route('admin.updateStatus') }}" method="POST">
            @csrf
            <input type="hidden" name="nim_nip" id="nim_nip">
            <input type="hidden" name="field" id="field">
            
            <div class="mb-4">
                <label for="status" class="block font-semibold mb-2">Select Status</label>
                <select name="status" id="status" class="w-full border px-3 py-2 rounded">
                    <option value="Ditolak" id="ditolak">Ditolak</option>
                    <option value="Diterima" id="diterima">Diterima</option>
                </select>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Submit</button>
                <button type="button" class="bg-gray-500 text-white py-2 px-4 rounded" onclick="closeModal()">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Open modal and set status based on current value
    function openModal(field, nim_nip, currentStatus) {
        document.getElementById('updateModal').classList.remove('hidden');
        document.getElementById('field').value = field;
        document.getElementById('nim_nip').value = nim_nip;

        // Set the select value based on the current status
        if (currentStatus === 'Ditolak') {
            document.getElementById('status').value = 'Ditolak';
        } else if (currentStatus === 'Diterima') {
            document.getElementById('status').value = 'Diterima';
        } else {
            document.getElementById('status').value = 'Ditolak'; // Default to Ditolak if none
        }
    }

    // Close modal
    function closeModal() {
        document.getElementById('updateModal').classList.add('hidden');
    }
</script>

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
    @if (session('error'))
    <div id="toast-warning" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
            </svg>
            <span class="sr-only">Warning icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{ session('error') }}</div>
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