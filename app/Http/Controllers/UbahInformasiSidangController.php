<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UbahInformasiSidangController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi input
        $request->validate([
            'kalender' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'filename' => 'required|string',
        ]);

        $folderPath = public_path('img/user/informasi-sidang');
        $filename = $request->filename; // contoh: s1-sistem-informasi.png
        $destination = $folderPath . '/' . $filename;

        // Hapus file lama jika ada
        if (File::exists($destination)) {
            File::delete($destination);
        }

        // Upload file baru
        $request->file('kalender')->move($folderPath, $filename);

        return redirect()->back()->with('success', 'Informasi Sidang berhasil diperbarui untuk: ' . strtoupper(str_replace('-', ' ', pathinfo($filename, PATHINFO_FILENAME))));
    }
}
