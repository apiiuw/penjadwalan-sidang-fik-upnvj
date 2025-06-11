@extends('user.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="my-20">
        <h1 class="uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Informasi Sidang</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
            <!-- S1 Sistem Informasi -->
            <div class="shadow-lg rounded-md">
                <h2 class="text-xl font-semibold text-center text-gray-800 bg-blue-100 py-2">S1 Sistem Informasi</h2>
                <img src="{{ asset('img/user/informasi-sidang/s1-sistem-informasi.png') }}" alt="S1 Sistem Informasi">
            </div>

            <!-- D3 Sistem Informasi -->
            <div class="shadow-lg rounded-md">
                <h2 class="text-xl font-semibold text-center text-gray-800 bg-blue-100 py-2">D3 Sistem Informasi</h2>
                <img src="{{ asset('img/user/informasi-sidang/d3-sistem-informasi.png') }}" alt="D3 Sistem Informasi">
            </div>

            <!-- S1 Informatika -->
            <div class="shadow-lg rounded-md">
                <h2 class="text-xl font-semibold text-center text-gray-800 bg-blue-100 py-2">S1 Informatika</h2>
                <img src="{{ asset('img/user/informasi-sidang/s1-informatika.png') }}" alt="S1 Informatika">
            </div>

            <!-- S1 Sains Data -->
            <div class="shadow-lg rounded-md">
                <h2 class="text-xl font-semibold text-center text-gray-800 bg-blue-100 py-2">S1 Sains Data</h2>
                <img src="{{ asset('img/user/informasi-sidang/s1-sains-data.png') }}" alt="S1 Sains Data">
            </div>
        </div>
    </div>


</div>
@endsection