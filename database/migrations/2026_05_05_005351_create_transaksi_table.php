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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembayaran_id')->constrained('pembayaran')->cascadeOnDelete();
            $table->string('nomor_invoice', 30)->unique(); // mis: "INV-20260505-001"
            $table->decimal('subtotal', 12, 2);
            $table->decimal('diskon', 12, 2)->default(0);
            $table->decimal('pajak', 12, 2)->default(0);
            $table->decimal('total', 12, 2);
            $table->timestamp('tanggal_transaksi')->useCurrent();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
