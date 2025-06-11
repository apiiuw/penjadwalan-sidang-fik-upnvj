@extends('pembimbing.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">
    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="space-y-10 my-20">

        <!-- Baris 1 -->
        <div class="flex justify-center gap-x-10">
            {{-- Card 1 --}}
            <a href="/pembimbing/nilai-mahasiswa" class=" w-96 bg-gradient-to-b from-black/90 to-blue-500 border-blue-700 rounded-lg shadow-sm transition duration-300 ease-in-out hover:scale-105">
                <img class="rounded-t-lg" src="{{ asset('img/user/card-1-syarat-dan-ketentuan-sidang.png') }}" alt="" />
                <div class="p-5">
                    <h5 class="text-xl text-center font-bold tracking-tight text-white">Nilai Mahasiswa</h5>
                </div>
            </a>
        </div>

    </div>



</div>

@endsection