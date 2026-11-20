<?php

namespace Database\Seeders;

use App\Models\Kurir;
use App\Models\Mitra;
use App\Models\Pelanggan;
use App\Models\User; //p12
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; //p12

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    
    public function run(): void
    {
        // 1. Admin
        User::firstOrCreate(
            ['email' => 'harun25ti@pcr.ac.id'],
            [
                'name'     => 'Harun Al Rasyid',
                'phone'    => '081200000000',
                'alamat'   => 'Jl. Umban Sari, Rumbai, Pekanbaru',
                'role'     => 'admin',
                'status'   => 'approved',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Pelanggan
        User::firstOrCreate(
            ['email' => 'buyer@example.test'],
            [
                'name'     => 'Nadia Putri',
                'phone'    => '081300000000',
                'alamat'   => 'Jl. HR. Soebrantas, Panam, Pekanbaru',
                'role'     => 'pelanggan',
                'status'   => 'approved',
                'password' => Hash::make('password123'),
            ]
        );

        Pelanggan::firstOrCreate(
            ['email' => 'buyer@example.test'],
            [
                'first_name' => 'Nadia',
                'last_name'  => 'Putri',
                'phone'      => '081300000000',
                'birthday'   => '2004-05-12',
                'gender'     => 'Female',
            ]
        );

        // 3. Mitra
        User::firstOrCreate(
            ['email' => 'mitra@example.test'],
            [
                'name'     => 'Mitra Print Sudut',
                'phone'    => '081234567890',
                'alamat'   => 'Jl. Umban Sari No. 12, Rumbai',
                'role'     => 'mitra',
                'status'   => 'approved',
                'password' => Hash::make('password123'),
            ]
        );

        Mitra::firstOrCreate(
            ['email' => 'mitra@example.test'],
            [
                'nama_toko'     => 'Mitra Print Sudut',
                'nama_pemilik'  => 'Budi Santoso',
                'phone'         => '081234567890',
                'alamat'        => 'Jl. Umban Sari No. 12, Rumbai',
                'lokasi'        => 'Umban Sari, dekat kampus',
                'deskripsi'     => 'Layanan cetak cepat, jilid skripsi, dan cetak warna.',
                'harga_bw'      => 300,
                'harga_warna'   => 1000,
                'layanan_antar' => true,
                'cetak_warna'   => true,
                'near_campus'   => true,
                'status'        => 'aktif',
                'rating'        => 4.8,
                'kapasitas_maks'=> 6,
            ]
        );

        // 4. Kurir
        User::firstOrCreate(
            ['email' => 'kurir@example.test'],
            [
                'name'     => 'Raka Pratama',
                'phone'    => '081211111111',
                'alamat'   => 'Jl. Garuda Sakti, Pekanbaru',
                'role'     => 'kurir',
                'status'   => 'approved',
                'password' => Hash::make('password123'),
            ]
        );

        Kurir::firstOrCreate(
            ['email' => 'kurir@example.test'],
            [
                'nama'            => 'Raka Pratama',
                'phone'           => '081211111111',
                'no_kendaraan'    => 'BM 4589 AB',
                'jenis_kendaraan' => 'Motor',
                'status'          => 'aktif',
                'rating'          => 4.9,
                'total_tugas'     => 14,
            ]
        );
    }
}
