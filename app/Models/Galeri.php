<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Galeri extends Model
{
    /**
     * Override nama tabel karena kita pakai singular ('galeri'),
     * bukan plural ('galeris') yang jadi default Laravel
     */
    protected $table = 'galeri';

    /**
     * Field yang boleh di-mass-assign
     */
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'kategori',
        'layanan_id',
        'tampil_di_beranda',
        'urutan',
        'aktif',
    ];

    /**
     * Type casting untuk auto-convert tipe data
     */
    protected $casts = [
        'tampil_di_beranda' => 'boolean',
        'aktif' => 'boolean',
        'urutan' => 'integer',
    ];

    // =========================================
    // RELATIONSHIPS
    // =========================================

    /**
     * Galeri belongs to Layanan (optional)
     * Mis: foto wedding day → terhubung ke layanan "Wedding Photography Premium"
     */
    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }

    // =========================================
    // SCOPES (Reusable Query)
    // =========================================

    /**
     * Filter foto yang aktif aja
     * Usage: Galeri::aktif()->get()
     */
    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    /**
     * Filter foto yang ditampilkan di beranda
     * Usage: Galeri::beranda()->get()
     */
    public function scopeBeranda($query)
    {
        return $query->where('tampil_di_beranda', true)->where('aktif', true);
    }

    /**
     * Filter foto berdasarkan kategori
     * Usage: Galeri::kategori('wedding')->get()
     */
    public function scopeKategori($query, string $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // =========================================
    // ACCESSORS
    // =========================================

    /**
     * Auto-generate full URL ke file foto
     * Usage: $galeri->foto_url
     */
    public function getFotoUrlAttribute(): string
    {
        // Kalau foto ada, generate URL pakai asset helper
        if ($this->foto) {
            return asset('storage/' . $this->foto);
        }

        // Default placeholder kalau gak ada foto
        return asset('photozone/img/project-1.jpg');
    }
}
