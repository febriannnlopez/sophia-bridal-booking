<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->enum('status', ['tersedia', 'dipesan', 'tutup', 'maintenance'])->default('tersedia');
            $table->text('keterangan')->nullable(); // mis: "Libur Imlek"
            $table->timestamps();

            // Mencegah duplicate slot waktu di tanggal yang sama
            $table->unique(['tanggal', 'jam_mulai'], 'jadwal_unique_slot');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
