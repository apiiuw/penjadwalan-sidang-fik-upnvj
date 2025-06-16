@extends('koor-prodi.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="my-20">
        <h1 class=" uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Input Jadwal Sidang Mahasiswa</h1>

        <div class="shadow-lg rounded-sm max-w-3xl mx-auto p-6 bg-white space-y-6 text-sm text-center">

            <form action="{{ route('jadwal.sidang.kirim', $mahasiswa->id) }}" method="POST" onsubmit="return confirm('Yakin mengirim jadwal sidang?')">
            @csrf
                <!-- Peserta -->
                <div class="grid grid-cols-3 gap-4 items-center border-b pb-4">
                    <div class="bg-green-100 px-4 py-2 font-semibold text-gray-800 rounded">Peserta</div>
                    <div class="col-span-2 grid grid-cols-2 gap-4">
                        <div>
                            {{ $mahasiswa->name }}<br>{{ $mahasiswa->nim_nip }}
                        </div>
                        <div>
                            Program Studi<br>{{ $mahasiswa->program_studi }}
                        </div>
                    </div>
                </div>

                <!-- Tempat dan Tanggal Pelaksanaan -->
                <div class="grid grid-cols-3 gap-4 items-center border-b pb-4">
                    <div class="bg-blue-100 px-4 py-2 font-semibold text-gray-800 rounded">
                        Tempat dan Tanggal Pelaksanaan
                    </div>
                    <div class="col-span-2 grid grid-cols-2 gap-4">
                        <div class="grid gap-2">
                            <input type="text" name="gedung_pelaksanaan" placeholder="{{ $mahasiswa->gedung_pelaksanaan }}" class="w-full border px-3 py-2 rounded placeholder:text-gray-400 text-center" />
                            <input type="text" name="ruang_pelaksanaan" placeholder="{{ $mahasiswa->ruang_pelaksanaan }}" class="w-full border px-3 py-2 rounded placeholder:text-gray-400 text-center" />
                        </div>
                        <div class="grid gap-2">
                            <input type="date" name="tanggal_pelaksanaan" value="{{ $mahasiswa->tanggal_pelaksanaan }}" class="w-full border px-3 py-2 rounded placeholder:text-gray-400 text-center" />
                            <input type="time" name="waktu_pelaksanaan" value="{{ $mahasiswa->waktu_pelaksanaan }}" class="w-full border px-3 py-2 rounded placeholder:text-gray-400 text-center" />
                        </div>
                    </div>
                </div>

                <!-- Dosen Pembimbing -->
                <div class="grid grid-cols-3 gap-4 items-center border-b pb-4">
                    <div class="bg-yellow-100 px-4 py-2 font-semibold text-gray-800 rounded">
                        Dosen Pembimbing
                    </div>
                    <div class="col-span-2 grid grid-cols-2 gap-4">
                        <input type="text" 
                            name="dosen_pembimbing_1" 
                            value="{{ $pendaftaran->dosen_pembimbing ?? '-' }}" 
                            readonly 
                            class="w-full border px-3 py-2 rounded bg-gray-100 text-center text-gray-500" />

                        <input type="text" 
                            name="dosen_pembimbing_2" 
                            value="{{ $pendaftaran->dosen_pembimbing ?? '-' }}" 
                            readonly 
                            class="w-full border px-3 py-2 rounded bg-gray-100 text-center text-gray-500" />
                    </div>
                </div>

                <!-- Dosen Penguji -->
                <div class="grid grid-cols-3 gap-4 items-center">
                    <div class="bg-red-100 px-4 py-2 font-semibold text-gray-800 rounded">Dosen Penguji</div>
                    <div class="col-span-2 grid grid-cols-2 gap-4">
                        @php
                            $dosenPengujiOptions = [
                                'S1 Sistem Informasi' => [
                                    'Rudhy Ho Purabaya, SE., MMSI.',
                                    'Artika Arista, S. Kom, MMSI',
                                    'Novi Trisman Hadi, S.Pd., M.Kom.',
                                ],
                                'D3 Sistem Informasi' => [
                                    'Tri Rahayu S.Kom., MM.',
                                    'Bobby Suryo Prakoso S.T., M.Kom',
                                    'Helena Nurramdhani Irmanda, S.Pd, M.Kom​',
                                ],
                                'S1 Informatika' => [
                                    'Dr. Widya Cholil, M.I.T',
                                    'Radinal Setyadinsa, S.Pd., M.T.I',
                                    'Jayanta, S.Kom., M.Si',
                                ],
                                'S1 Sains Data' => [
                                    'Muhammad Adrezo, S.Kom.,M.Sc',
                                    'Muhammad Panji Muslim, S.Pd., M.Kom.',
                                    'Musthofa Galih Pradana, M.Kom.',
                                ],
                            ];

                            $options = $dosenPengujiOptions[$mahasiswa->program_studi] ?? [];
                        @endphp

                        <select name="dosen_penguji_1" class="w-full border px-3 py-2 rounded text-center text-gray-700">
                            <option value="" disabled selected>Pilih Dosen Penguji 1</option>
                            @foreach ($options as $dosen)
                                <option value="{{ $dosen }}" {{ $mahasiswa->dosen_penguji1 === $dosen ? 'selected' : '' }}>{{ $dosen }}</option>
                            @endforeach
                        </select>

                        <select name="dosen_penguji_2" class="w-full border px-3 py-2 rounded text-center text-gray-700">
                            <option value="" disabled selected>Pilih Dosen Penguji 2</option>
                            @foreach ($options as $dosen)
                                <option value="{{ $dosen }}" {{ $mahasiswa->dosen_penguji2 === $dosen ? 'selected' : '' }}>{{ $dosen }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="text-center mt-6">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Kirim Jadwal Sidang
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