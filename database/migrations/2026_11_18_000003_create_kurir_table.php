<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kurir', function (Blueprint $table) {
            $table->id('kurir_id');
            $table->string('nama', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 20)->nullable();
            $table->string('no_kendaraan', 20)->nullable();
            $table->string('jenis_kendaraan', 50)->nullable();
            $table->string('foto', 255)->nullable();
            $table->enum('status', ['aktif', 'nonaktif', 'bertugas'])->default('aktif');
            $table->decimal('rating', 2, 1)->default(0);
            $table->integer('total_tugas')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kurir');
    }
};
