@extends('auth.layouts.main')
@section('container')

<div class="relative bg-cover bg-center h-screen w-full flex justify-center items-center" style="background-image: url('/img/bg/Background-UPNVJ.png')">
  <div class="absolute inset-0 bg-black bg-opacity-60"></div>

  <div class="relative z-10 text-black bg-white rounded-xl shadow-md px-10 py-5 w-full max-w-md">
    <h1 class="font-bold text-xl text-center">SIGN IN</h1>
    <p class="font-light text-lg text-center py-2 mb-6">Web Penjadwalan Sidang dan Tugas Akhir<br>Fakultas Ilmu Komputer</p>

    {{-- Tampilkan error jika user belum login --}}
    <div class="fixed top-4 right-4 z-50">
      @if(session('auth_error'))
        <div id="toast-warning" class="flex items-center w-full max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                </svg>
                <span class="sr-only">Warning icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('auth_error') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-warning" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
      @endif
    </div>

    <form action="{{ url('/sign-in') }}" method="POST" class="space-y-5">
        @csrf

        <!-- Input Email -->
        <div>
          <label for="email" class="block text-sm font-medium mb-1">Email</label>
          <input type="email" id="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Input Password -->
        <div>
          <label for="password" class="block text-sm font-medium mb-1">Password</label>
          <input type="password" id="password" name="password" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        @error('email')
          <span class="text-sm text-red-600 mt-2">{{ $message }}</span>
        @enderror

        @error('password')
          <span class="text-sm text-red-600 mt-2">{{ $message }}</span>
        @enderror

        <!-- Tombol Submit -->
        <div class="pt-4">
          <button type="submit"
                  class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition duration-300">
              Masuk
          </button>
        </div>
    </form>
  </div>
</div>

@endsection
