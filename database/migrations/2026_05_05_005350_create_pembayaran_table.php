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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();
            $table->decimal('jumlah_dp', 12, 2)->default(0);
            $table->decimal('jumlah_pelunasan', 12, 2)->default(0);
            $table->decimal('total_dibayar', 12, 2)->default(0);
            $table->enum('metode', ['transfer_bank', 'qris', 'tunai', 'debit', 'e_wallet'])->nullable();
            $table->enum('status', [
                'belum_bayar',
                'dp_dibayar',
                'lunas',
                'gagal',
                'refund'
            ])->default('belum_bayar');
            $table->string('bukti_dp')->nullable(); // path file
            $table->string('bukti_pelunasan')->nullable();
            $table->timestamp('tanggal_dp')->nullable();
            $table->timestamp('tanggal_pelunasan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
