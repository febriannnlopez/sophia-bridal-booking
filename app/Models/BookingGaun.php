<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingGaun extends Model
{
    use HasFactory;

    protected $table = 'booking_gaun';

    protected $fillable = [
        'booking_id',
        'koleksi_gaun_id',
        'tanggal_ambil',
        'tanggal_kembali',
        'harga_sewa',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal_ambil' => 'date',
        'tanggal_kembali' => 'date',
        'harga_sewa' => 'decimal:2',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function koleksiGaun()
    {
        return $this->belongsTo(KoleksiGaun::class);
    }
}
