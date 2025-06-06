@extends('user.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="my-20">
        <h1 class=" uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Ketentuan dan Syarat Sidang</h1>

        <div class="border-2 border-black shadow-lg rounded-sm p-4 max-w-3xl mx-auto">
        <div class="border-b-2 border-black mb-4">
            <h2 class="text-center font-bold text-xl mb-4">SIDANG SKRIPSI DAN SIDANG AKHIR</h2>
        </div>
        <ol class="list-decimal pl-5 space-y-2 text-sm md:text-lg">
            <li>
            Persyaratan Akademik.
            <span class="inline-block align-middle ml-1">
                <i class="fa-solid fa-file-pdf text-red-500"></i>
            </span>
            </li>
            <li>
            Persyaratan Administrasi.
            <span class="inline-block align-middle ml-1">
                <i class="fa-solid fa-file-pdf text-red-500"></i>
            </span>
            </li>
            <li>Tidak melakukan plagiarisme.</li>
            <li>Batas maksimal hasil cek plagiarisme (Turnitin), contohnya maksimal 30%.</li>
            <li>
            Menyelesaikan bimbingan dengan Dosen Pembimbing sesuai dengan batas minimum
            pertemuan yang ditentukan Program Studi.
            </li>
        </ol>
        </div>

    </div>

</div>
@endsection