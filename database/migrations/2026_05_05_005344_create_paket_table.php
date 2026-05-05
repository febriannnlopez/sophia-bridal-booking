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
        Schema::create('paket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->constrained('layanan')->cascadeOnDelete();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->decimal('harga', 12, 2);
            $table->decimal('harga_promo', 12, 2)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('foto_utama')->nullable();
            $table->integer('durasi_menit')->default(60);
            $table->enum('tipe_session', ['indoor', 'outdoor', 'studio', 'on_location', 'flexible'])->default('flexible');
            $table->integer('kapasitas_orang')->default(1); // untuk family photo
            $table->boolean('is_unggulan')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket');
    }
};
