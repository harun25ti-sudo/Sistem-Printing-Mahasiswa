<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    protected $table = 'kurir';
    protected $primaryKey = 'kurir_id';

    protected $fillable = [
        'nama',
        'email',
        'phone',
        'no_kendaraan',
        'jenis_kendaraan',
        'foto',
        'status',
        'rating',
        'total_tugas',
    ];

    protected $casts = [
        'rating'      => 'decimal:1',
        'total_tugas' => 'integer',
    ];
}
