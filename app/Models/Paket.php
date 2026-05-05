<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';

    protected $fillable = [
        'layanan_id',
        'nama',
        'slug',
        'harga',
        'harga_promo',
        'deskripsi',
        'foto_utama',
        'durasi_menit',
        'tipe_session',
        'kapasitas_orang',
        'is_unggulan',
        'is_active',
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'harga_promo' => 'decimal:2',
        'is_unggulan' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function items()
    {
        return $this->hasMany(PaketItem::class)->orderBy('urutan');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Accessor: dapatkan harga aktual (kalau ada promo, pakai promo)
    public function getHargaAktualAttribute()
    {
        return $this->harga_promo ?? $this->harga;
    }
}
