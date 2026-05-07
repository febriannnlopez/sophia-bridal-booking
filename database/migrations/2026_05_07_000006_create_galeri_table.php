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
        Schema::create('galeri', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 150);
            $table->text('deskripsi')->nullable();
            $table->string('foto'); // path file di storage
            $table->enum('kategori', [
                'wedding',
                'prewedding',
                'akad',
                'resepsi',
                'engagement',
                'keluarga',
                'maternity',
                'studio',
                'lainnya'
            ])->default('wedding');

            // Optional link ke layanan tertentu
            $table->foreignId('layanan_id')->nullable()
                ->constrained('layanan')->nullOnDelete();

            // Apakah tampil di slider beranda?
            $table->boolean('tampil_di_beranda')->default(false);

            // Urutan tampil (untuk sorting custom)
            $table->integer('urutan')->default(0);

            // Toggle aktif/non-aktif (soft toggle, gak perlu delete)
            $table->boolean('aktif')->default(true);

            $table->timestamps();

            // Index untuk query yang sering dipakai
            $table->index(['kategori', 'aktif']);
            $table->index('tampil_di_beranda');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri');
    }
};
