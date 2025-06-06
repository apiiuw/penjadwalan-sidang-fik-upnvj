@extends('koor-prodi.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="my-20">
        <h1 class=" uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Ketersediaan Dosen Penguji</h1>

    <div class="space-y-10 my-20">

        <!-- Baris 1 -->
        <div class="flex justify-center gap-x-10">
            {{-- Card 1 --}}
            <a href="/koor-prodi/ketersediaan-dosen-penguji/s1-sistem-informasi" class=" w-72 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg" src="{{ asset('img/BG/Prodi-FIK.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-xl text-center font-bold tracking-tight text-white">S1 Sistem Informasi</h5>
                </div>
            </a>
            {{-- Card 2 --}}
            <a href="/koor-prodi/ketersediaan-dosen-penguji/d3-sistem-informasi" class=" w-72 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg" src="{{ asset('img/BG/Prodi-FIK.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-xl text-center font-bold tracking-tight text-white">D3 Sistem Informasi</h5>
                </div>
            </a>
            {{-- Card 3 --}}
            <a href="/koor-prodi/ketersediaan-dosen-penguji/s1-informatika" class=" w-72 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg" src="{{ asset('img/BG/Prodi-FIK.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-xl text-center font-bold tracking-tight text-white">S1 Informatika</h5>
                </div>
            </a>
            {{-- Card 4 --}}
            <a href="/koor-prodi/ketersediaan-dosen-penguji/s1-sains-data" class=" w-72 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg" src="{{ asset('img/BG/Prodi-FIK.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-xl text-center font-bold tracking-tight text-white">S1 Sains Data</h5>
                </div>
            </a>
        </div>

    </div>

    </div>

</div>

@endsection