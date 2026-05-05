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
        Schema::create('booking_gaun', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();
            $table->foreignId('koleksi_gaun_id')->constrained('koleksi_gaun');
            $table->date('tanggal_ambil');
            $table->date('tanggal_kembali');
            $table->decimal('harga_sewa', 12, 2); // snapshot harga waktu booking
            $table->enum('status', ['dipesan', 'diambil', 'dikembalikan', 'denda'])->default('dipesan');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_gaun');
    }
};
