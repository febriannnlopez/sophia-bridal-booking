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
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->nullable()->constrained('bookings')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->enum('channel', ['email', 'whatsapp', 'in_app'])->default('in_app');
            $table->enum('tipe', [
                'booking_baru',
                'konfirmasi_booking',
                'reminder_h1',
                'pembayaran_diterima',
                'booking_dibatalkan',
                'booking_ditolak'
            ]);
            $table->string('judul');
            $table->text('pesan');
            $table->enum('status', ['pending', 'terkirim', 'gagal', 'dibaca'])->default('pending');
            $table->timestamp('dikirim_pada')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
