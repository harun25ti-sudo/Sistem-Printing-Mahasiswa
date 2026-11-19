<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    protected $table = 'mitra';
    protected $primaryKey = 'mitra_id';

    protected $fillable = [
        'nama_toko',
        'nama_pemilik',
        'email',
        'phone',
        'alamat',
        'lokasi',
        'deskripsi',
        'foto',
        'harga_bw',
        'harga_warna',
        'layanan_antar',
        'cetak_warna',
        'near_campus',
        'status',
        'rating',
        'kapasitas_maks',
    ];

    protected $casts = [
        'layanan_antar' => 'boolean',
        'cetak_warna'   => 'boolean',
        'near_campus'   => 'boolean',
        'harga_bw'      => 'decimal:0',
        'harga_warna'   => 'decimal:0',
        'rating'        => 'decimal:1',
    ];
}
