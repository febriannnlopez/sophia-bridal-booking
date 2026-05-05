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
        Schema::create('koleksi_gaun', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gaun', 30)->unique(); // mis: "GP-001"
            $table->string('nama');
            $table->enum('kategori', [
                'gaun_pengantin',
                'gaun_pesta',
                'kebaya',
                'baju_adat',
                'cheongsam',
                'suit_pria',
                'jas_formal'
            ]);
            $table->enum('ukuran', ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'custom']);
            $table->string('warna')->nullable();
            $table->decimal('harga_sewa', 12, 2);
            $table->string('foto_utama')->nullable();
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['tersedia', 'sedang_disewa', 'maintenance', 'tidak_aktif'])->default('tersedia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('koleksi_gaun');
    }
};
