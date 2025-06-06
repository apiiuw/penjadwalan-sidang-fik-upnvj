<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UbahKalenderController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'kalender' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $folderPath = public_path('img/user/kalender-jadwal-sidang');
        $filename = 'kalender-jadwal-sidang.png';
        $destination = $folderPath . '/' . $filename;

        // Hapus file lama jika ada
        if (File::exists($destination)) {
            File::delete($destination);
        }

        // Upload file baru
        $request->file('kalender')->move($folderPath, $filename);

        return redirect()->back()->with('success', 'Kalender berhasil diperbarui!');
    }
}
