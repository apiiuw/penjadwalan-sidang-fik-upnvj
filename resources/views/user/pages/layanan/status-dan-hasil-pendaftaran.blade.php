@extends('user.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="my-20">
        <h1 class=" uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Status dan Hasil Pendaftaran</h1>

        <div class="shadow-lg rounded-sm max-w-3xl mx-auto p-6 bg-white space-y-6 text-sm text-center">
        <!-- Peserta -->
        <div class="grid grid-cols-3 gap-4 items-center border-b pb-4">
            <div class="bg-green-100 px-4 py-2 font-semibold text-gray-800 rounded">Peserta</div>
            <div class="col-span-2  grid grid-cols-2 gap-4">
                <div>
                    {{ $user->name }}<br>{{ $user->nim_nip }}
                </div>
                <div>
                    Program Studi<br>{{ $user->program_studi }}
                </div>
            </div>
        </div>

        <!-- Tempat dan Tanggal Pelaksanaan -->
        <div class="grid grid-cols-3 gap-4 items-center border-b pb-4">
            <div class="bg-blue-100 px-4 py-2 font-semibold text-gray-800 rounded">Tempat dan Tanggal Pelaksanaan</div>
            <div class="col-span-2 grid grid-cols-2 gap-4">
            <div>
                {{ $data->gedung_pelaksanaan }}<br>{{ $data->ruang_pelaksanaan }}
            </div>
            <div>
                {{ $data->tanggal_pelaksanaan }}<br>Pukul {{ $data->waktu_pelaksanaan }} s/d Selesai
            </div>
            </div>
        </div>

        <!-- Dosen Pembimbing -->
        <div class="grid grid-cols-3 gap-4 items-center border-b pb-4">
            <div class="bg-yellow-100 px-4 py-2 font-semibold text-gray-800 rounded">Dosen Pembimbing</div>
            <div class="col-span-2 grid grid-cols-2 gap-4">
            <div>{{ $data->dosen_pembimbing1 }}</div>
            <div>{{ $data->dosen_pembimbing2 }}</div>
            </div>
        </div>

        <!-- Dosen Penguji -->
        <div class="grid grid-cols-3 gap-4 items-center">
            <div class="bg-red-100 px-4 py-2 font-semibold text-gray-800 rounded">Dosen Penguji</div>
            <div class="col-span-2 grid grid-cols-2 gap-4">
            <div>{{ $data->dosen_penguji1 }}</div>
            <div>{{ $data->dosen_penguji2 }}</div>
            </div>
        </div>
        </div>

    </div>

</div>
@endsection