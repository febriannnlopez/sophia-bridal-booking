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
        Schema::table('pembayaran', function (Blueprint $table) {
            // Status verifikasi admin (terpisah dari status pembayaran)
            $table->enum('status_verifikasi', [
                'menunggu',     // Pelanggan udah upload bukti, admin belum cek
                'disetujui',    // Admin udah verifikasi & approve
                'ditolak',      // Admin tolak (bukti gak valid)
                'belum_upload'  // Default, belum ada bukti
            ])->default('belum_upload')->after('status');

            // Catatan tambahan dari pelanggan (mis: "Transfer dari rekening BCA")
            $table->text('catatan_pelanggan')->nullable()->after('bukti_pelunasan');

            // Catatan dari admin saat verifikasi (mis: "Bukti tidak jelas, mohon upload ulang")
            $table->text('catatan_admin')->nullable()->after('catatan_pelanggan');

            // Tanggal admin melakukan verifikasi
            $table->timestamp('tanggal_verifikasi')->nullable()->after('catatan_admin');

            // ID admin/staff yang melakukan verifikasi
            $table->foreignId('diverifikasi_oleh')->nullable()->after('tanggal_verifikasi')
                ->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropForeign(['diverifikasi_oleh']);
            $table->dropColumn([
                'status_verifikasi',
                'catatan_pelanggan',
                'catatan_admin',
                'tanggal_verifikasi',
                'diverifikasi_oleh',
            ]);
        });
    }
};
