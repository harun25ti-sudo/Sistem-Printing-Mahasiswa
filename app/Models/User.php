<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'alamat',
        'role',
        'status',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isMitra(): bool
    {
        return $this->role === 'mitra';
    }

    public function isKurir(): bool
    {
        return $this->role === 'kurir';
    }

    public function isPelanggan(): bool
    {
        return $this->role === 'pelanggan';
    }

    public function getRoleLabelAttribute(): string
    {
        return match ($this->role) {
            'pelanggan' => 'Pelanggan',
            'mitra'     => 'Mitra Printing',
            'kurir'     => 'Kurir Pengantar',
            'admin'     => 'Administrator',
            default     => 'Pelanggan',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'approved' => 'Aktif / Disetujui',
            'pending'  => 'Menunggu Konfirmasi',
            'rejected' => 'Ditolak',
            default    => 'Aktif',
        };
    }
}
