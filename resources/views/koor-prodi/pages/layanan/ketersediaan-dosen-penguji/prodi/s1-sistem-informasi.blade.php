@extends('koor-prodi.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="my-20">
        <h1 class=" uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Ketersediaan Dosen Penguji<br>S1 Sistem Informasi</h1>

    <div class="space-y-10 my-20">

        <!-- Baris 1 -->
        <div class="flex justify-center gap-x-10">
            {{-- Card 1 --}}
            <a href="#" class=" w-72 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('img/koor-prodi/s1-sistem-informasi/Rudy-Ho-Purabaya.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-md text-center font-bold tracking-tight text-white">Rudhy Ho Purabaya, SE., MMSI.</h5>
                    <h5 class="text-md text-center tracking-tight text-green-400 uppercase">Tersedia</h5>
                </div>
            </a>
            {{-- Card 2 --}}
            <a href="#" class=" w-72 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('img/koor-prodi/s1-sistem-informasi/Artika-Arista.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-md text-center font-bold tracking-tight text-white">Artika Arista, S. Kom, MMSI</h5>
                    <h5 class="text-md text-center tracking-tight text-red-400 uppercase">Tidak Tersedia</h5>
                </div>
            </a>
            {{-- Card 3 --}}
            <a href="#" class=" w-72 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg w-full h-72 object-cover" src="{{ asset('img/koor-prodi/s1-sistem-informasi/Novi-Trisman-Hadi.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-md text-center font-bold tracking-tight text-white">Novi Trisman Hadi, S.Pd., M.Kom.</h5>
                    <h5 class="text-md text-center tracking-tight text-green-400 uppercase">Tersedia</h5>
                </div>
            </a>
        </div>

    </div>

    </div>

</div>

@endsection