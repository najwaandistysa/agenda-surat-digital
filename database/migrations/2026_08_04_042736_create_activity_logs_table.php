<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('username');   // Siapa yang melakukan aksi
            $table->string('aktivitas');  // Deskripsi aksi (contoh: "Menambahkan surat nomor 01/SMK8")
            $table->timestamps();         // Menyimpan waktu otomatis (created_at)
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};