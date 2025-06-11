@extends('admin.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="my-20">
        <h1 class=" uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Informasi Sidang</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
            @php
                $prodis = [
                    ['nama' => 'S1 Sistem Informasi', 'file' => 's1-sistem-informasi.png'],
                    ['nama' => 'D3 Sistem Informasi', 'file' => 'd3-sistem-informasi.png'],
                    ['nama' => 'S1 Informatika', 'file' => 's1-informatika.png'],
                    ['nama' => 'S1 Sains Data', 'file' => 's1-sains-data.png'],
                ];
            @endphp

            @foreach ($prodis as $prodi)
                <div class="shadow-lg rounded-sm">
                    <h2 class="text-xl font-semibold text-center text-gray-800 bg-blue-100 py-2">{{ $prodi['nama'] }}</h2>
                    <img src="{{ asset('img/user/informasi-sidang/' . $prodi['file']) }}" alt="{{ $prodi['nama'] }}" class="w-full">
                    <div class="flex justify-center my-3">
                        <button onclick="openModal('{{ $prodi['nama'] }}', '{{ $prodi['file'] }}')" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Ubah Kalender
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal Background -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
    <!-- Modal content -->
    <div class="bg-white rounded-lg p-6 w-96 max-w-full">
        <h2 id="modalTitle" class="text-xl font-semibold mb-4 text-center">Ubah Informasi Sidang</h2>

        <form id="uploadForm" action="{{ route('ubah.informasi') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="filename" id="filename">
            <input type="file" name="kalender" id="imageInput" accept="image/*" required />

            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" id="closeModalBtn" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Toast --}}
<div class="fixed top-4 right-4 z-50">
    @if (session('success'))
        <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
</div>

<script>
    const modal = document.getElementById('modal');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modalTitle = document.getElementById('modalTitle');
    const filenameInput = document.getElementById('filename');

    function openModal(prodiName, fileName) {
        modal.classList.remove('hidden');
        modalTitle.innerText = `Ubah Informasi Sidang - ${prodiName}`;
        filenameInput.value = fileName;
    }

    closeModalBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });
</script>


@endsection