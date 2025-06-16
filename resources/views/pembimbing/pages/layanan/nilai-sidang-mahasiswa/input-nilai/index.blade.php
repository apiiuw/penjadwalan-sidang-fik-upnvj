@extends('pembimbing.layouts.main')
@section('container')

<div class="w-full h-full flex flex-col justify-center">

    <img class="w-full h-screen" src="{{ asset('img/user/Carousel-User.png') }}" alt="">

    <div class="my-20">
        <h1 class=" uppercase w-full text-center text-3xl font-bold text-blue-700 mb-8">Input Hasil dan Nilai Sidang Mahasiswa</h1>

        <form id="form-nilai-sidang" action="{{ route('pembimbing.nilai-sidang.store', ['id' => $mahasiswa->id]) }}" method="POST">
            @csrf
            <div class="shadow-lg rounded-sm max-w-3xl mx-auto p-6 bg-white space-y-6 text-sm text-center">
                {{-- Biodata Mahasiswa --}}
                <div class="flex justify-center">
                    <div class="bg-green-100 border border-black text-center px-5 py-2">
                        {{ $mahasiswa->name }}
                    </div>
                    <div class="bg-green-100 border border-black text-center px-5 py-2">
                        {{ $mahasiswa->nim_nip }}
                    </div>
                </div>

                <!-- Ketua Penguji -->
                <div class="hidden">
                    <div class="bg-red-100 text-gray-800 font-semibold px-4 py-2 rounded inline-block mb-2">KETUA PENGUJI (REVIEWER)</div>
                    <table class="w-full border border-gray-300 text-left" id="penilaian-table">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-2 py-1 text-center">No</th>
                                <th class="border px-2 py-1">Aspek Yang Dinilai</th>
                                <th class="border px-2 py-1 text-center">Nilai</th>
                                <th class="border px-2 py-1 text-center">Bobot</th>
                                <th class="border px-2 py-1 text-center">Nilai * Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-2 py-1 text-center">1</td>
                                <td class="border px-2 py-1">Presentasi</td>
                                <td class="border text-center">
                                    <input type="number" name="ketua_nilai_presentasi" value="{{ $mahasiswa->ketua_nilai_presentasi }}" class=" placeholder:text-gray-500 nilai-ketua w-14 text-center no-spinner" data-bobot="0.2">
                                </td>
                                <td class="border text-center">20%</td>
                                <td class="border text-center nilai-bobot-ketua">0.00</td>
                            </tr>
                            <tr>
                                <td class="border px-2 py-1 text-center">2</td>
                                <td class="border px-2 py-1">Penguasaan Materi</td>
                                <td class="border text-center">
                                    <input type="number" name="ketua_nilai_penguasaan_materi" value="{{ $mahasiswa->ketua_nilai_penguasaan_materi }}" class="placeholder:text-gray-500 nilai-ketua w-14 text-center no-spinner" data-bobot="0.3">
                                </td>
                                <td class="border text-center">30%</td>
                                <td class="border text-center nilai-bobot-ketua">0.00</td>
                            </tr>
                            <tr>
                                <td class="border px-2 py-1 text-center">3</td>
                                <td class="border px-2 py-1">Penulisan</td>
                                <td class="border text-center">
                                    <input type="number" name="ketua_nilai_penulisan" value="{{ $mahasiswa->ketua_nilai_penulisan }}" class="placeholder:text-gray-500 nilai-ketua w-14 text-center no-spinner" data-bobot="0.15">
                                </td>
                                <td class="border text-center">15%</td>
                                <td class="border text-center nilai-bobot-ketua">0.00</td>
                            </tr>
                            <tr>
                                <td class="border px-2 py-1 text-center">4</td>
                                <td class="border px-2 py-1">Hasil Akhir</td>
                                <td class="border text-center">
                                    <input type="number" name="ketua_nilai_hasil_akhir" value="{{ $mahasiswa->ketua_nilai_hasil_akhir }}" class="placeholder:text-gray-500 nilai-ketua w-14 text-center no-spinner" data-bobot="0.35">
                                </td>
                                <td class="border text-center">35%</td>
                                <td class="border text-center nilai-bobot-ketua">0.00</td>
                            </tr>
                            <tr class="font-semibold bg-gray-50">
                                <td colspan="4" class="border px-2 py-1 text-right">NILAI AKHIR</td>
                                <td class="border text-center" id="total-nilai-ketua">0.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Penguji 1 - Pembimbing -->
                <div class="{{ $peranPembimbing !== 'pembimbing_1' ? 'hidden' : '' }}">
                    <div class="bg-yellow-100 text-gray-800 font-semibold px-4 py-2 rounded inline-block mb-2">PENGUJI 1 (PEMBIMBING)</div>
                    <div class="mb-2 font-semibold">Nilai Sidang</div>
                    <table class="w-full border border-gray-300 text-left mb-4">
                    <thead class="bg-gray-100">
                        <tr>
                        <th class="border px-2 py-1 text-center">No</th>
                        <th class="border px-2 py-1">Aspek Yang Dinilai</th>
                        <th class="border px-2 py-1 text-center">Nilai</th>
                        <th class="border px-2 py-1 text-center">Bobot</th>
                        <th class="border px-2 py-1 text-center">Nilai * Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-2 py-1 text-center">1</td>
                            <td class="border px-2 py-1">Presentasi</td>
                            <td class="border text-center">
                                <input type="number" name="penguji1_nilai_sidang_presentasi" value="{{ $mahasiswa->penguji1_nilai_sidang_presentasi }}" class=" placeholder:text-gray-500 nilai-penguji1-sidang w-14 text-center no-spinner" data-bobot="0.2">
                            </td>
                            <td class="border text-center">20%</td>
                            <td class="border text-center nilai-bobot-penguji1-sidang">00.00</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-center">2</td>
                            <td class="border px-2 py-1">Penguasaan Materi</td>
                            <td class="border text-center">
                                <input type="number" name="penguji1_nilai_sidang_penguasaan_materi" value="{{ $mahasiswa->penguji1_nilai_sidang_penguasaan_materi }}" class=" placeholder:text-gray-500 nilai-penguji1-sidang w-14 text-center no-spinner" data-bobot="0.3">
                            </td>
                            <td class="border text-center">30%</td>
                            <td class="border text-center nilai-bobot-penguji1-sidang">00.00</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-center">3</td>
                            <td class="border px-2 py-1">Penulisan</td>
                            <td class="border text-center">
                                <input type="number" name="penguji1_nilai_sidang_penulisan" value="{{ $mahasiswa->penguji1_nilai_sidang_penguasaan_materi }}" class=" placeholder:text-gray-500 nilai-penguji1-sidang w-14 text-center no-spinner" data-bobot="0.15">
                            </td>
                            <td class="border text-center">15%</td>
                            <td class="border text-center nilai-bobot-penguji1-sidang">00.00</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-center">4</td>
                            <td class="border px-2 py-1">Hasil Akhir</td>
                            <td class="border text-center">
                                <input type="number" name="penguji1_nilai_sidang_hasil_akhir" value="{{ $mahasiswa->penguji1_nilai_sidang_hasil_akhir }}" class=" placeholder:text-gray-500 nilai-penguji1-sidang w-14 text-center no-spinner" data-bobot="0.35">
                            </td>
                            <td class="border text-center">35%</td>
                            <td class="border text-center nilai-bobot-penguji1-sidang">00.00</td>
                        </tr>
                        <tr class="font-semibold bg-gray-50">
                            <td colspan="4" class="border px-2 py-1 text-right">NILAI AKHIR</td>
                            <td class="border text-center" id="total-nilai-penguji1-sidang">00.00</td>
                        </tr>
                    </tbody>
                    </table>

                    <div class="mb-2 font-semibold">Nilai Bimbingan</div>
                    <table class="w-full border border-gray-300 text-left">
                    <thead class="bg-gray-100">
                        <tr>
                        <th class="border px-2 py-1 text-center">No</th>
                        <th class="border px-2 py-1">Aspek Yang Dinilai</th>
                        <th class="border px-2 py-1 text-center">Nilai</th>
                        <th class="border px-2 py-1 text-center">Bobot</th>
                        <th class="border px-2 py-1 text-center">Nilai * Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-2 py-1 text-center">1</td>
                            <td class="border px-2 py-1">Ketepatan</td>
                            <td class="border text-center">
                                <input type="number" name="penguji1_nilai_bimbingan_ketepatan" value="{{ $mahasiswa->penguji1_nilai_bimbingan_ketepatan }}" class=" placeholder:text-gray-500 nilai-penguji1-bimbingan w-14 text-center no-spinner" data-bobot="0.4">
                            </td>
                            <td class="border text-center">40%</td>
                            <td class="border text-center nilai-bobot-penguji1-bimbingan">00.00</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-center">2</td>
                            <td class="border px-2 py-1">Ketekunan & Usaha</td>
                            <td class="border text-center">
                                <input type="number" name="penguji1_nilai_bimbingan_ketekunan_usaha" value="{{ $mahasiswa->penguji1_nilai_bimbingan_ketekunan_usaha }}" class=" placeholder:text-gray-500 nilai-penguji1-bimbingan w-14 text-center no-spinner" data-bobot="0.3">
                            </td>
                            <td class="border text-center">30%</td>
                            <td class="border text-center nilai-bobot-penguji1-bimbingan">00.00</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-center">3</td>
                            <td class="border px-2 py-1">Tingkah Laku</td>
                            <td class="border text-center">
                                <input type="number" name="penguji1_nilai_bimbingan_tingkah_laku" value="{{ $mahasiswa->penguji1_nilai_bimbingan_tingkah_laku }}" class="placeholder:text-gray-500 nilai-penguji1-bimbingan w-14 text-center no-spinner" data-bobot="0.3">
                            </td>
                            <td class="border text-center">30%</td>
                            <td class="border text-center nilai-bobot-penguji1-bimbingan">00.00</td>
                        </tr>
                        <tr class="font-semibold bg-gray-50">
                            <td colspan="4" class="border px-2 py-1 text-right">NILAI BIMBINGAN</td>
                            <td class="border text-center" id="total-nilai-penguji1-bimbingan">00.00</td>
                        </tr>
                    </tbody>
                    </table>
                </div>

                <!-- Penguji 2 -->
                <div class="hidden">
                    <div class="bg-blue-100 text-gray-800 font-semibold px-4 py-2 rounded inline-block mb-2">PENGUJI 2 (KOMPREHENSIF)</div>
                    <table class="w-full border border-gray-300 text-left">
                    <thead class="bg-gray-100">
                        <tr>
                        <th class="border px-2 py-1 text-center">No</th>
                        <th class="border px-2 py-1">Aspek Yang Dinilai</th>
                        <th class="border px-2 py-1 text-center">Nilai</th>
                        <th class="border px-2 py-1 text-center">Bobot</th>
                        <th class="border px-2 py-1 text-center">Nilai * Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-2 py-1 text-center">1</td>
                            <td class="border px-2 py-1">Cara Menjawab</td>
                            <td class="border text-center">
                                <input type="number" name="penguji2_nilai_sidang_cara_menjawab" value="{{ $mahasiswa->penguji2_nilai_sidang_cara_menjawab }}" class=" placeholder:text-gray-500 nilai-penguji2-sidang w-14 text-center no-spinner" data-bobot="0.3">
                            </td>
                            <td class="border text-center">30%</td>
                            <td class="border text-center nilai-bobot-penguji2-sidang">00.00</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-center">2</td>
                            <td class="border px-2 py-1">Kecepatan Menjawab</td>
                            <td class="border text-center">
                                <input type="number" name="penguji2_nilai_sidang_kecepatan_menjawab" value="{{ $mahasiswa->penguji2_nilai_sidang_kecepatan_menjawab }}" class=" placeholder:text-gray-500 nilai-penguji2-sidang w-14 text-center no-spinner" data-bobot="0.3">
                            </td>
                            <td class="border text-center">30%</td>
                            <td class="border text-center nilai-bobot-penguji2-sidang">00.00</td>
                        </tr>
                        <tr>
                            <td class="border px-2 py-1 text-center">3</td>
                            <td class="border px-2 py-1">Ketepatan Menjawab</td>
                            <td class="border text-center">
                                <input type="number" name="penguji2_nilai_sidang_ketepatan_menjawab" value="{{ $mahasiswa->penguji2_nilai_sidang_ketepatan_menjawab }}" class=" placeholder:text-gray-500 nilai-penguji2-sidang w-14 text-center no-spinner" data-bobot="0.4">
                            </td>
                            <td class="border text-center">40%</td>
                            <td class="border text-center nilai-bobot-penguji2-sidang">00.00</td>
                        </tr>
                        <tr class="font-semibold bg-gray-50">
                            <td colspan="4" class="border px-2 py-1 text-right">NILAI AKHIR</td>
                            <td class="border text-center" id="total-nilai-penguji2-sidang">00.00</td>
                        </tr>
                    </tbody>
                    </table>
                </div>

                <div class="flex justify-center">
                    <button type="submit" onclick="return konfirmasiSimpan(event)" class="bg-green-300 hover:bg-green-400 rounded  border border-black text-center px-5 py-2">Simpan Nilai</button>
                </div>

            </div>
        </form>



    </div>

</div>

<script>
    function kalkulasiNilai(prefix) {
        const nilaiInputs = document.querySelectorAll(`.nilai-${prefix}`);
        const nilaiBobotCells = document.querySelectorAll(`.nilai-bobot-${prefix}`);
        let total = 0;

        nilaiInputs.forEach((input, index) => {
            const bobot = parseFloat(input.dataset.bobot) || 0;
            const nilai = parseFloat(input.value) || 0;
            const hasil = nilai * bobot;
            nilaiBobotCells[index].textContent = hasil.toFixed(2);
            total += hasil;
        });

        const totalElem = document.getElementById(`total-nilai-${prefix}`);
            if (totalElem) {
                totalElem.textContent = total.toFixed(2);
            }
    }

    // Daftar semua penilai
    const semuaPenilai = ['ketua', 'penguji1-sidang', 'penguji1-bimbingan', 'penguji2-sidang'];

    semuaPenilai.forEach(prefix => {
        const inputs = document.querySelectorAll(`.nilai-${prefix}`);
        inputs.forEach(input => {
            input.addEventListener('input', () => {
            kalkulasiNilai(prefix);
            });
        });
    });

    function konfirmasiSimpan(event) {
        event.preventDefault(); // Hentikan form dulu

        const nama = "{{ $mahasiswa->name }}";
        const nim = "{{ $mahasiswa->nim_nip }}";

        if (confirm(`Yakin menyimpan nilai ${nama} (${nim})?`)) {
            document.getElementById('form-nilai-sidang').submit();
        }
    }
</script>

@endsection