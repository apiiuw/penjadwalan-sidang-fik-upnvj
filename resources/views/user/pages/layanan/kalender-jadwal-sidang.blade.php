@extends('user.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="my-20">
        <h1 class=" uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Kalender Jadwal Sidang</h1>

        <div class="shadow-lg rounded-sm max-w-3xl mx-auto">
            <img src="{{ asset('img/user/kalender-jadwal-sidang/kalender-jadwal-sidang.png') }}" alt="">
        </div>

    </div>

</div>
@endsection