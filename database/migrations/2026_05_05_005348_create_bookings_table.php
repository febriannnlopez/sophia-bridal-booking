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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking', 30)->unique(); // mis: "SB-20260505-001"
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('paket_id')->constrained('paket');
            $table->foreignId('jadwal_id')->constrained('jadwal');
            $table->enum('status', [
                'pending',           // baru dibuat, belum dibayar DP
                'menunggu_konfirmasi', // DP udah dibayar, nunggu admin verif
                'dikonfirmasi',      // Disetujui admin
                'sedang_berlangsung', // Hari H
                'selesai',           // Event selesai
                'dibatalkan',        // Dibatalkan customer/admin
                'ditolak'            // Admin tolak
            ])->default('pending');
            $table->text('catatan')->nullable(); // catatan dari pelanggan
            $table->text('catatan_admin')->nullable(); // catatan internal admin
            $table->enum('sumber', ['website', 'whatsapp', 'instagram', 'walkin', 'lainnya'])->default('website');
            $table->decimal('total_harga', 12, 2);
            $table->timestamps();

            $table->index(['status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
