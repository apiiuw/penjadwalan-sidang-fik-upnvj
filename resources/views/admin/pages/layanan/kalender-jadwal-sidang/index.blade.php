@extends('admin.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="my-20">
        <h1 class=" uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Kalender Jadwal Sidang</h1>

        <div class="shadow-lg rounded-sm max-w-3xl mx-auto">
            <img src="{{ asset('img/user/kalender-jadwal-sidang/kalender-jadwal-sidang.png') }}" alt="">
        </div>

        <div class="flex justify-center items-center mt-10">
            <!-- Button untuk buka popup -->
            <button id="openModalBtn" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Ubah Kalender
            </button>

            <!-- Modal Background -->
            <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
                <!-- Modal content -->
                <div class="bg-white rounded-lg p-6 w-96 max-w-full">
                <h2 class="text-xl font-semibold mb-4">Ubah Kalender Jadwal Sidang</h2>
                
                <form id="uploadForm" action="{{ route('ubah.kalender') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="file" name="kalender" id="imageInput" accept="image/*" required />

                    <div class="flex justify-end space-x-2 mt-4">
                        <button type="button" id="closeModalBtn" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Simpan</button>
                    </div>
                </form>

                </div>
            </div>
        </div>
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
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modal = document.getElementById('modal');
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');

    // Buka modal
    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Tutup modal
    closeModalBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
        resetPreview();
    });

    // Preview gambar ketika file dipilih
    imageInput.addEventListener('change', () => {
        const file = imageInput.files[0];
        if (file) {
        const reader = new FileReader();
        reader.onload = e => {
            imagePreview.src = e.target.result;
            imagePreview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
        } else {
        resetPreview();
        }
    });

    function resetPreview() {
        imagePreview.src = '';
        imagePreview.classList.add('hidden');
        imageInput.value = '';
    }

    // Simpan button (contoh fungsi, sesuaikan kebutuhan)
    document.getElementById('saveBtn').addEventListener('click', () => {
        alert('Gambar berhasil disimpan!');
        modal.classList.add('hidden');
        resetPreview();
    });
</script>

@endsection