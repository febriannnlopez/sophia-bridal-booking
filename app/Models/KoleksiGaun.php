<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KoleksiGaun extends Model
{
    use HasFactory;

    protected $table = 'koleksi_gaun';

    protected $fillable = [
        'kode_gaun',
        'nama',
        'kategori',
        'ukuran',
        'warna',
        'harga_sewa',
        'foto_utama',
        'deskripsi',
        'status',
    ];

    protected $casts = [
        'harga_sewa' => 'decimal:2',
    ];

    public function bookings()
    {
        return $this->belongsToMany(Booking::class, 'booking_gaun')
                    ->withPivot('tanggal_ambil', 'tanggal_kembali', 'harga_sewa', 'status', 'catatan')
                    ->withTimestamps();
    }
}
