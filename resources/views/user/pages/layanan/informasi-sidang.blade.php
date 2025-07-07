@extends('user.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

<div class="my-20">
    <h1 class="uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Informasi Sidang</h1>

    <!-- Grid updated to ensure 4 columns even on large screens -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
        <!-- S1 Sistem Informasi -->
        <div class="shadow-xl rounded-lg border border-blue-200 p-6 bg-gradient-to-r from-blue-100 via-blue-200 to-blue-300 hover:shadow-2xl transform transition duration-300 hover:scale-105">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">S1 Sistem Informasi</h2>
            <div class="flex justify-center items-center mb-4">
                <i class="fa-solid fa-database text-blue-600 text-5xl"></i>
            </div>
            <p class="text-center text-lg font-medium text-gray-700">Jumlah Pendaftaran: <span class="font-bold text-blue-800">{{ $programStudiCounts['S1 Sistem Informasi'] }}</span></p>
        </div>

        <!-- D3 Sistem Informasi -->
        <div class="shadow-xl rounded-lg border border-green-200 p-6 bg-gradient-to-r from-green-100 via-green-200 to-green-300 hover:shadow-2xl transform transition duration-300 hover:scale-105">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">D3 Sistem Informasi</h2>
            <div class="flex justify-center items-center mb-4">
                <i class="fa-solid fa-database text-green-600 text-5xl"></i>
            </div>
            <p class="text-center text-lg font-medium text-gray-700">Jumlah Pendaftaran: <span class="font-bold text-green-800">{{ $programStudiCounts['D3 Sistem Informasi'] }}</span></p>
        </div>

        <!-- S1 Informatika -->
        <div class="shadow-xl rounded-lg border border-red-200 p-6 bg-gradient-to-r from-red-100 via-red-200 to-red-300 hover:shadow-2xl transform transition duration-300 hover:scale-105">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">S1 Informatika</h2>
            <div class="flex justify-center items-center mb-4">
                <i class="fa-solid fa-database text-red-600 text-5xl"></i>
            </div>
            <p class="text-center text-lg font-medium text-gray-700">Jumlah Pendaftaran: <span class="font-bold text-red-800">{{ $programStudiCounts['S1 Informatika'] }}</span></p>
        </div>

        <!-- S1 Sains Data -->
        <div class="shadow-xl rounded-lg border border-yellow-200 p-6 bg-gradient-to-r from-yellow-100 via-yellow-200 to-yellow-300 hover:shadow-2xl transform transition duration-300 hover:scale-105">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">S1 Sains Data</h2>
            <div class="flex justify-center items-center mb-4">
                <i class="fa-solid fa-database text-yellow-600 text-5xl"></i>
            </div>
            <p class="text-center text-lg font-medium text-gray-700">Jumlah Pendaftaran: <span class="font-bold text-yellow-800">{{ $programStudiCounts['S1 Sains Data'] }}</span></p>
        </div>
    </div>
</div>

</div>
@endsection