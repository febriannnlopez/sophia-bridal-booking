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
        Schema::create('testimoni', function (Blueprint $table) {
            $table->id();

            // Link ke booking — kalau testimoni dari pelanggan asli (verified review)
            $table->foreignId('booking_id')->nullable()
                ->constrained('bookings')->nullOnDelete();

            // Link ke user — kalau testimoni dari sistem (user yang login)
            $table->foreignId('user_id')->nullable()
                ->constrained('users')->nullOnDelete();

            // Nama yang ditampilkan (bisa beda dari user, misal "Diana & Reza")
            $table->string('nama_klien', 100);

            // Profesi/status (mis: "Pasangan Pengantin", "Klien Cheongsam")
            $table->string('profesi', 100)->nullable();

            // Foto klien (opsional, bisa pakai default kalau gak upload)
            $table->string('foto_klien')->nullable();

            // Rating 1-5 bintang
            $table->tinyInteger('rating')->default(5);

            // Judul testimoni (opsional, mis: "Pelayanan Memuaskan!")
            $table->string('judul', 150)->nullable();

            // Isi testimoni utama
            $table->text('isi');

            // Status moderasi
            $table->enum('status', [
                'menunggu_moderasi',  // Baru submit, belum di-review admin
                'disetujui',          // Admin approve, tampil di publik
                'ditolak'             // Admin tolak (mis: spam, tidak pantas)
            ])->default('menunggu_moderasi');

            // Apakah featured di beranda (slider testimoni)?
            $table->boolean('tampil_di_beranda')->default(false);

            // Urutan tampil (untuk sorting custom)
            $table->integer('urutan')->default(0);

            // Admin yang melakukan moderasi
            $table->foreignId('disetujui_oleh')->nullable()
                ->constrained('users')->nullOnDelete();

            // Tanggal moderasi
            $table->timestamp('tanggal_disetujui')->nullable();

            $table->timestamps();

            // Index untuk query yang sering dipakai
            $table->index(['status', 'tampil_di_beranda']);
            $table->index('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimoni');
    }
};
