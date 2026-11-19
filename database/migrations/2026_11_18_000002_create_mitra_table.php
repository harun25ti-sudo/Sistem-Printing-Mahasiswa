<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->id('mitra_id');
            $table->string('nama_toko', 100);
            $table->string('nama_pemilik', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 20)->nullable();
            $table->text('alamat')->nullable();
            $table->string('lokasi', 100)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto', 255)->nullable();
            $table->decimal('harga_bw', 10, 0)->default(300);
            $table->decimal('harga_warna', 10, 0)->default(1000);
            $table->boolean('layanan_antar')->default(false);
            $table->boolean('cetak_warna')->default(true);
            $table->boolean('near_campus')->default(false);
            $table->enum('status', ['aktif', 'nonaktif', 'pending'])->default('pending');
            $table->decimal('rating', 2, 1)->default(0);
            $table->integer('kapasitas_maks')->default(6);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mitra');
    }
};
