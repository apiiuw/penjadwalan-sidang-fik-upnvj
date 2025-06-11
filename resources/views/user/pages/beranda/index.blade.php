@extends('user.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">
    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="space-y-10 my-20">
        <!-- Baris 1 -->
        <div class="flex justify-center gap-x-10">
            {{-- Card 1 --}}
            <a href="/ketentuan-dan-syarat-sidang" class=" w-96 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg" src="{{ asset('img/user/card-1-syarat-dan-ketentuan-sidang.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-xl text-center font-bold tracking-tight text-white">Ketentuan dan Syarat Sidang</h5>
                </div>
            </a>

            {{-- Card 2 --}}
            <a href="/informasi-sidang" class=" w-96 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg" src="{{ asset('img/user/card-2-kalender-jadwal-sidang.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-xl text-center font-bold tracking-tight text-white">Informasi Sidang</h5>
                </div>
            </a>
        </div>

        <!-- Baris 2 -->
        <div class="flex justify-center gap-x-10">
            {{-- Card 3 --}}
            <a href="/alur-pengajuan-judul-sidang" class=" w-96 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg" src="{{ asset('img/user/card-3-alur-pengajuan-judul-sidang.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-xl text-center font-bold tracking-tight text-white">Alur Pengajuan Judul Sidang</h5>
                </div>
            </a>

            {{-- Card 4 --}}
            <a href="/pendaftaran-sidang" class=" w-96 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg" src="{{ asset('img/user/card-4-pendaftaran-sidang.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-xl text-center font-bold tracking-tight text-white">Pendaftaran Sidang</h5>
                </div>
            </a>
        </div>

        <!-- Baris 3 -->
        <div class="flex justify-center gap-x-10">
            {{-- Card 5 --}}
            <a href="/status-dan-hasil-pendaftaran" class=" w-96 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg" src="{{ asset('img/user/card-5-status-dan-hasil-pendaftaran.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-xl text-center font-bold tracking-tight text-white">Status dan Hasil Pendaftaran</h5>
                </div>
            </a>

            {{-- Card 6 --}}
            <a href="/hasil-dan-nilai-sidang" class=" w-96 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg" src="{{ asset('img/user/card-6-hasil-dan-nilai-sidang.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-xl text-center font-bold tracking-tight text-white">Hasil dan Nilai Sidang</h5>
                </div>
            </a>
        </div>
    </div>



</div>


@endsection