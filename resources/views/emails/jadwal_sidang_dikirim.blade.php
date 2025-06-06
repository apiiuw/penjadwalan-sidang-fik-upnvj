<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Jadwal Sidang</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f7fa; margin: 0; padding: 20px;">
    <div style="max-width: 600px; background-color: #ffffff; margin: 0 auto; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <h2 style="color: #2c3e50; text-align: center;">📅 Jadwal Sidang Anda</h2>
        <p style="font-size: 16px; color: #333;">Berikut adalah jadwal sidang Anda yang telah ditetapkan:</p>

        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <td style="padding: 8px; font-weight: bold; color: #555;">Ruang</td>
                <td style="padding: 8px;">{{ $mahasiswa->ruang_pelaksanaan }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; font-weight: bold; color: #555;">Gedung</td>
                <td style="padding: 8px;">{{ $mahasiswa->gedung_pelaksanaan }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; font-weight: bold; color: #555;">Tanggal</td>
                <td style="padding: 8px;">{{ \Carbon\Carbon::parse($mahasiswa->tanggal_pelaksanaan)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; font-weight: bold; color: #555;">Waktu</td>
                <td style="padding: 8px;">{{ $mahasiswa->waktu_pelaksanaan }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; font-weight: bold; color: #555;">Dosen Pembimbing 1</td>
                <td style="padding: 8px;">{{ $mahasiswa->dosen_pembimbing1 }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; font-weight: bold; color: #555;">Dosen Pembimbing 2</td>
                <td style="padding: 8px;">{{ $mahasiswa->dosen_pembimbing2 }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; font-weight: bold; color: #555;">Dosen Penguji 1</td>
                <td style="padding: 8px;">{{ $mahasiswa->dosen_penguji1 }}</td>
            </tr>
            <tr>
                <td style="padding: 8px; font-weight: bold; color: #555;">Dosen Penguji 2</td>
                <td style="padding: 8px;">{{ $mahasiswa->dosen_penguji2 }}</td>
            </tr>
        </table>

        <p style="margin-top: 30px; font-size: 16px; color: #333;">
            Silakan hadir tepat waktu dan persiapkan diri Anda dengan baik. Semoga sukses dalam sidang Anda!
        </p>

        <div style="margin-top: 40px; text-align: center; color: #888; font-size: 13px;">
            &copy; {{ date('Y') }} Penjadwalan Sidang FIK UPNVJ. All rights reserved.
        </div>
    </div>
</body>
</html>
