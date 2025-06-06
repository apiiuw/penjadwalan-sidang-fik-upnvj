<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nilai Sidang</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f7fa; margin: 0; padding: 20px;">
    <div style="max-width: 800px; background-color: #ffffff; margin: 0 auto; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <h2 style="color: #2c3e50; text-align: center;">📋 Nilai Sidang Telah Diperbarui</h2>
        <p style="font-size: 16px; color: #333;">
            Halo, {{ $nilai->name }} ({{ $nilai->nim_nip }}). Berikut adalah rincian nilai sidang Anda:
        </p>

        {{-- Ketua Penguji --}}
        <h3 style="color: #2c3e50;">Ketua Penguji</h3>
        <table style="width: 100%; border-collapse: collapse;" border="1">
            <thead>
                <tr style="background-color: #f0f0f0;">
                    <th style="padding: 8px;">No</th>
                    <th style="padding: 8px;">Aspek Yang Dinilai</th>
                    <th style="padding: 8px;">Nilai</th>
                    <th style="padding: 8px;">Bobot</th>
                    <th style="padding: 8px;">Nilai * Bobot</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $ketua_total = $nilai->ketua_nilai_presentasi * 0.2 +
                                   $nilai->ketua_nilai_penguasaan_materi * 0.3 +
                                   $nilai->ketua_nilai_penulisan * 0.15 +
                                   $nilai->ketua_nilai_hasil_akhir * 0.35;
                @endphp
                <tr>
                    <td style="padding: 8px; text-align: center;">1</td>
                    <td style="padding: 8px;">Presentasi</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->ketua_nilai_presentasi }}</td>
                    <td style="padding: 8px; text-align: center;">20%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->ketua_nilai_presentasi * 0.2 }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; text-align: center;">2</td>
                    <td style="padding: 8px;">Penguasaan Materi</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->ketua_nilai_penguasaan_materi }}</td>
                    <td style="padding: 8px; text-align: center;">30%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->ketua_nilai_penguasaan_materi * 0.3 }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; text-align: center;">3</td>
                    <td style="padding: 8px;">Penulisan</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->ketua_nilai_penulisan }}</td>
                    <td style="padding: 8px; text-align: center;">15%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->ketua_nilai_penulisan * 0.15 }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; text-align: center;">4</td>
                    <td style="padding: 8px;">Hasil Akhir</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->ketua_nilai_hasil_akhir }}</td>
                    <td style="padding: 8px; text-align: center;">35%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->ketua_nilai_hasil_akhir * 0.35 }}</td>
                </tr>
                <tr style="font-weight: bold; background-color: #f0f0f0;">
                    <td colspan="4" style="padding: 8px; text-align: center;">Total</td>
                    <td style="padding: 8px; text-align: center;">{{ number_format($ketua_total, 2) }}</td>
                </tr>
            </tbody>
        </table>

        {{-- Penguji 1 --}}
        <h3 style="color: #2c3e50; margin-top: 0.75rem;">Penguji 1 (Pembimbing)</h3>
        {{-- Penguji 1 Nilai Sidang --}}
        <h3 style="color: #404f5f;">Nilai Sidang</h3>
        <table style="width: 100%; border-collapse: collapse;" border="1">
            <thead>
                <tr style="background-color: #f0f0f0;">
                    <th style="padding: 8px;">No</th>
                    <th style="padding: 8px;">Aspek Yang Dinilai</th>
                    <th style="padding: 8px;">Nilai</th>
                    <th style="padding: 8px;">Bobot</th>
                    <th style="padding: 8px;">Nilai * Bobot</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $pengui1_nilai_sidang_total = $nilai->penguji1_nilai_sidang_presentasi * 0.2 +
                                                $nilai->penguji1_nilai_sidang_penguasaan_materi * 0.3 +
                                                $nilai->penguji1_nilai_sidang_penulisan * 0.15 +
                                                $nilai->penguji1_nilai_sidang_hasil_akhir * 0.35;
                @endphp
                <tr>
                    <td style="padding: 8px; text-align: center;">1</td>
                    <td style="padding: 8px;">Presentasi</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji1_nilai_sidang_presentasi }}</td>
                    <td style="padding: 8px; text-align: center;">20%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji1_nilai_sidang_presentasi * 0.2 }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; text-align: center;">2</td>
                    <td style="padding: 8px;">Penguasaan Materi</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji1_nilai_sidang_penguasaan_materi }}</td>
                    <td style="padding: 8px; text-align: center;">30%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji1_nilai_sidang_penguasaan_materi * 0.3 }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; text-align: center;">3</td>
                    <td style="padding: 8px;">Penulisan</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji1_nilai_sidang_penulisan }}</td>
                    <td style="padding: 8px; text-align: center;">15%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji1_nilai_sidang_penulisan * 0.15 }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; text-align: center;">4</td>
                    <td style="padding: 8px;">Hasil Akhir</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji1_nilai_sidang_hasil_akhir }}</td>
                    <td style="padding: 8px; text-align: center;">35%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji1_nilai_sidang_hasil_akhir * 0.35 }}</td>
                </tr>
                <tr style="font-weight: bold; background-color: #f0f0f0;">
                    <td colspan="4" style="padding: 8px; text-align: center;">Total</td>
                    <td style="padding: 8px; text-align: center;">{{ number_format($pengui1_nilai_sidang_total, 2) }}</td>
                </tr>
            </tbody>
        </table>
        {{-- Penguji 1 Nilai Bimbingan --}}
        <h3 style="color: #404f5f; margin-top: 0.75rem;">Nilai Bimbingan</h3>
        <table style="width: 100%; border-collapse: collapse;" border="1">
            <thead>
                <tr style="background-color: #f0f0f0;">
                    <th style="padding: 8px;">No</th>
                    <th style="padding: 8px;">Aspek Yang Dinilai</th>
                    <th style="padding: 8px;">Nilai</th>
                    <th style="padding: 8px;">Bobot</th>
                    <th style="padding: 8px;">Nilai * Bobot</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $pengui1_nilai_bimbingan_total = $nilai->penguji1_nilai_bimbingan_ketepatan * 0.4 +
                                                    $nilai->penguji1_nilai_bimbingan_ketekunan_usaha * 0.3 +
                                                    $nilai->penguji1_nilai_bimbingan_tingkah_laku * 0.3;
                @endphp
                <tr>
                    <td style="padding: 8px; text-align: center;">1</td>
                    <td style="padding: 8px;">Presentasi</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji1_nilai_bimbingan_ketepatan }}</td>
                    <td style="padding: 8px; text-align: center;">20%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji1_nilai_bimbingan_ketepatan * 0.4 }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; text-align: center;">2</td>
                    <td style="padding: 8px;">Penguasaan Materi</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji1_nilai_bimbingan_ketekunan_usaha }}</td>
                    <td style="padding: 8px; text-align: center;">30%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji1_nilai_bimbingan_ketekunan_usaha * 0.3 }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; text-align: center;">3</td>
                    <td style="padding: 8px;">Penulisan</td>
                    <td style="padding: 8px; text-align: center;">15%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji1_nilai_bimbingan_tingkah_laku * 0.3 }}</td>
                </tr>
                <tr style="font-weight: bold; background-color: #f0f0f0;">
                    <td colspan="4" style="padding: 8px; text-align: center;">Total</td>
                    <td style="padding: 8px; text-align: center;">{{ number_format($pengui1_nilai_bimbingan_total, 2) }}</td>
                </tr>
            </tbody>
        </table>

        {{-- Penguji 2 --}}
        <h3 style="color: #2c3e50; margin-top: 0.75rem;">Penguji 2 (Komprehensif)</h3>
        <table style="width: 100%; border-collapse: collapse;" border="1">
            <thead>
                <tr style="background-color: #f0f0f0;">
                    <th style="padding: 8px;">No</th>
                    <th style="padding: 8px;">Aspek Yang Dinilai</th>
                    <th style="padding: 8px;">Nilai</th>
                    <th style="padding: 8px;">Bobot</th>
                    <th style="padding: 8px;">Nilai * Bobot</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $penguji2_nilai_sidang_total = $nilai->penguji2_nilai_sidang_cara_menjawab * 0.3 +
                                                    $nilai->penguji2_nilai_sidang_kecepatan_menjawab * 0.3 +
                                                    $nilai->penguji2_nilai_sidang_ketepatan_menjawab * 0.4;
                @endphp
                <tr>
                    <td style="padding: 8px; text-align: center;">1</td>
                    <td style="padding: 8px;">Presentasi</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji2_nilai_sidang_cara_menjawab }}</td>
                    <td style="padding: 8px; text-align: center;">20%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji2_nilai_sidang_cara_menjawab * 0.3 }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; text-align: center;">2</td>
                    <td style="padding: 8px;">Penguasaan Materi</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji2_nilai_sidang_kecepatan_menjawab }}</td>
                    <td style="padding: 8px; text-align: center;">30%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji2_nilai_sidang_kecepatan_menjawab * 0.3 }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; text-align: center;">3</td>
                    <td style="padding: 8px;">Penulisan</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji2_nilai_sidang_ketepatan_menjawab }}</td>
                    <td style="padding: 8px; text-align: center;">15%</td>
                    <td style="padding: 8px; text-align: center;">{{ $nilai->penguji2_nilai_sidang_ketepatan_menjawab * 0.4 }}</td>
                </tr>
                <tr style="font-weight: bold; background-color: #f0f0f0;">
                    <td colspan="4" style="padding: 8px; text-align: center;">Total</td>
                    <td style="padding: 8px; text-align: center;">{{ number_format($penguji2_nilai_sidang_total, 2) }}</td>
                </tr>
            </tbody>
        </table>


        <p style="margin-top: 30px; font-size: 16px; color: #333;">
            Silakan hubungi koordinator jika terdapat ketidaksesuaian data. Semoga sukses untuk langkah selanjutnya!
        </p>

        <div style="margin-top: 40px; text-align: center; color: #888; font-size: 13px;">
            &copy; {{ date('Y') }} Penilaian Sidang FIK UPNVJ. All rights reserved.
        </div>
    </div>
</body>
</html>
