<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'booking_id',
        'jumlah_dp',
        'jumlah_pelunasan',
        'total_dibayar',
        'metode',
        'status',
        'bukti_dp',
        'bukti_pelunasan',
        'tanggal_dp',
        'tanggal_pelunasan',

        // Field baru dari migration B.1
        'status_verifikasi',
        'catatan_pelanggan',
        'catatan_admin',
        'tanggal_verifikasi',
        'diverifikasi_oleh',
    ];

    protected $casts = [
        'jumlah_dp' => 'decimal:2',
        'jumlah_pelunasan' => 'decimal:2',
        'total_dibayar' => 'decimal:2',
        'tanggal_dp' => 'datetime',
        'tanggal_pelunasan' => 'datetime',
        'tanggal_verifikasi' => 'datetime',
    ];

    // =========================================
    // RELATIONSHIPS
    // =========================================

    /**
     * Pembayaran milik booking
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Pembayaran punya satu transaksi keuangan
     */
    public function transaksi(): HasOne
    {
        return $this->hasOne(Transaksi::class);
    }

    /**
     * Admin yang melakukan verifikasi
     * (relationship baru — eksplisit kasih FK karena field-nya 'diverifikasi_oleh')
     */
    public function verifikator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'diverifikasi_oleh');
    }

    // =========================================
    // SCOPES
    // =========================================

    /**
     * Pembayaran yang nunggu verifikasi admin
     * Usage: Pembayaran::menungguVerifikasi()->get()
     */
    public function scopeMenungguVerifikasi($query)
    {
        return $query->where('status_verifikasi', 'menunggu');
    }

    /**
     * Pembayaran yang udah disetujui
     */
    public function scopeDisetujui($query)
    {
        return $query->where('status_verifikasi', 'disetujui');
    }

    /**
     * Pembayaran yang ditolak
     */
    public function scopeDitolak($query)
    {
        return $query->where('status_verifikasi', 'ditolak');
    }

    /**
     * Pembayaran yang udah lunas
     */
    public function scopeLunas($query)
    {
        return $query->where('status', 'lunas');
    }

    // =========================================
    // ACCESSORS
    // =========================================

    /**
     * Format jumlah dp dalam format Rupiah
     * Usage: $pembayaran->jumlah_dp_formatted → "Rp 5.000.000"
     */
    public function getJumlahDpFormattedAttribute(): string
    {
        return 'Rp ' . number_format($this->jumlah_dp, 0, ',', '.');
    }

    /**
     * Format jumlah pelunasan dalam format Rupiah
     */
    public function getJumlahPelunasanFormattedAttribute(): string
    {
        return 'Rp ' . number_format($this->jumlah_pelunasan, 0, ',', '.');
    }

    /**
     * Format total dibayar dalam format Rupiah
     */
    public function getTotalDibayarFormattedAttribute(): string
    {
        return 'Rp ' . number_format($this->total_dibayar, 0, ',', '.');
    }

    /**
     * URL ke file bukti DP
     */
    public function getBuktiDpUrlAttribute(): ?string
    {
        return $this->bukti_dp ? asset('storage/' . $this->bukti_dp) : null;
    }

    /**
     * URL ke file bukti pelunasan
     */
    public function getBuktiPelunasanUrlAttribute(): ?string
    {
        return $this->bukti_pelunasan ? asset('storage/' . $this->bukti_pelunasan) : null;
    }

    /**
     * Cek apakah pembayaran udah diverifikasi admin
     * Usage: @if($pembayaran->is_verified)
     */
    public function getIsVerifiedAttribute(): bool
    {
        return $this->status_verifikasi === 'disetujui';
    }

    /**
     * Cek apakah pelanggan udah upload bukti tapi belum diverifikasi
     */
    public function getNeedsReviewAttribute(): bool
    {
        return $this->status_verifikasi === 'menunggu';
    }
}
