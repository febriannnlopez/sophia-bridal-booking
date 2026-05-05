<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    protected $casts = [
        'jumlah_dp' => 'decimal:2',
        'jumlah_pelunasan' => 'decimal:2',
        'total_dibayar' => 'decimal:2',
        'tanggal_dp' => 'datetime',
        'tanggal_pelunasan' => 'datetime',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class);
    }
}
