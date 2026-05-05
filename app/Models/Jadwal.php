<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

    // Helper: cek apakah slot ini tersedia
    public function isTersedia(): bool
    {
        return $this->status === 'tersedia';
    }
}
