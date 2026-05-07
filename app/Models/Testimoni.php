<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimoni extends Model
{
    /**
     * Override nama tabel (singular)
     */
    protected $table = 'testimoni';

    /**
     * Field yang boleh di-mass-assign
     */
    protected $fillable = [
        'booking_id',
        'user_id',
        'nama_klien',
        'profesi',
        'foto_klien',
        'rating',
        'judul',
        'isi',
        'status',
        'tampil_di_beranda',
        'urutan',
        'disetujui_oleh',
        'tanggal_disetujui',
    ];

    /**
     * Type casting
     */
    protected $casts = [
        'rating' => 'integer',
        'tampil_di_beranda' => 'boolean',
        'urutan' => 'integer',
        'tanggal_disetujui' => 'datetime',
    ];

    // =========================================
    // RELATIONSHIPS
    // =========================================

    /**
     * Testimoni dari booking mana (verified review)
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Testimoni dari user yang login
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Admin yang approve testimoni
     */
    public function moderator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'disetujui_oleh');
    }

    // =========================================
    // SCOPES
    // =========================================

    /**
     * Hanya testimoni yang udah disetujui
     * Usage: Testimoni::disetujui()->get()
     */
    public function scopeDisetujui($query)
    {
        return $query->where('status', 'disetujui');
    }

    /**
     * Testimoni yang nunggu moderasi
     * Usage: Testimoni::menungguModerasi()->get()
     */
    public function scopeMenungguModerasi($query)
    {
        return $query->where('status', 'menunggu_moderasi');
    }

    /**
     * Testimoni featured untuk beranda
     * Usage: Testimoni::beranda()->get()
     */
    public function scopeBeranda($query)
    {
        return $query->where('status', 'disetujui')
            ->where('tampil_di_beranda', true);
    }

    /**
     * Testimoni rating tinggi (4-5 bintang)
     */
    public function scopeRatingTinggi($query)
    {
        return $query->where('rating', '>=', 4);
    }

    // =========================================
    // ACCESSORS
    // =========================================

    /**
     * Auto-generate URL foto klien
     */
    public function getFotoKlienUrlAttribute(): string
    {
        if ($this->foto_klien) {
            return asset('storage/' . $this->foto_klien);
        }

        // Default avatar dari template
        return asset('photozone/img/testimonial-1.jpg');
    }

    /**
     * Format rating jadi bintang visual
     * Usage: $testimoni->rating_bintang → ⭐⭐⭐⭐⭐
     */
    public function getRatingBintangAttribute(): string
    {
        return str_repeat('⭐', $this->rating);
    }

    /**
     * Cek apakah testimoni dari pelanggan terverifikasi
     * Usage: @if($testimoni->is_verified) ...
     */
    public function getIsVerifiedAttribute(): bool
    {
        return $this->booking_id !== null;
    }
}
