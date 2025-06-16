@extends('admin.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="my-20">
        <h1 class=" uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Daftar Data Sidang Mahasiswa</h1>

        <div class="px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">

                <form method="GET" action="{{ route('admin.daftar-sidang') }}" class="max-w-4xl mx-auto">   
                    @csrf
                    <label for="default-search" class="mb-2 text-sm font-medium text-black sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none justify-center">
                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" name="search" id="default-search" value="{{ request('search') }}"
                            class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Ketikkan NIM atau Nama" />
                        <button type="submit"
                            class="text-white absolute end-2.5 bottom-2.5 bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                            Search
                        </button>
                    </div>
                </form>

                <div class="relative overflow-x-auto shadow-md rounded-lg mt-5">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class=" text-md text-white uppercase bg-blue-500">
                            <tr>
                                <th scope="col" class="px-1 py-3 text-center">NO</th>
                                <th scope="col" class="px-3 py-3 text-center">NIM</th>
                                <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                                <th scope="col" class="px-3 py-3 text-center">Tanggal Daftar</th>
                                <th scope="col" class="px-6 py-3"><span class="sr-only">Lihat Berkas</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $index => $mahasiswa)
                                <tr class="bg-white border-b hover:bg-blue-100 text-gray-800 text-base">
                                    <th scope="row" class="px-1 py-4 font-medium whitespace-nowrap text-black text-center">
                                        {{ $index + 1 }}
                                    </th>
                                    <td class="px-3 py-4 text-center">{{ $mahasiswa->nim_nip }}</td>
                                    <td class="px-6 py-4">{{ $mahasiswa->name }}</td>
                                    <td class="px-3 py-4 text-center">
                                        {{ \Carbon\Carbon::createFromFormat('d/m/Y', $mahasiswa->tanggal_daftar)->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('admin.detail-berkas-mahasiswa', ['id' => $mahasiswa->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            Lihat Berkas
                                        </a>
                                    </td>
                                </tr> 
                            @endforeach
                            @if($data->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center text-gray-500 py-6">Data tidak ditemukan.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>

    </div>

</div>

@endsection