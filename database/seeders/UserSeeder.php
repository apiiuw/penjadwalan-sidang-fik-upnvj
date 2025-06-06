<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role' => 'Admin',
                'name' => 'Admin UPNVJ',
                'nim_nip' => '1987654321',
                'email' => 'admin@dikjar.upnvj.ac.id',
                'program_studi' => NULL,
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('admin123'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Koordinator Program Studi',
                'name' => 'Rio Wirawan',
                'nim_nip' => '1234567890',
                'email' => 'rio.wirawan@dosen.upnvj.ac.id',
                'program_studi' => 'D3 Sistem Informasi',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('koorprodi123'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Mahasiswa',
                'name' => 'Aliyya Putri Nadya',
                'nim_nip' => '2210501035',
                'email' => '2210501035@mahasiswa.upnvj.ac.id',
                'program_studi' => 'D3 Sistem Informasi',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('mahasiswa123'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'role' => 'Mahasiswa',
                'name' => 'Rafi Rizqallah Andila',
                'nim_nip' => '2210501029',
                'email' => '2210501029@mahasiswa.upnvj.ac.id',
                'program_studi' => 'D3 Sistem Informasi',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('mahasiswa123'),
                'remember_token' => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
