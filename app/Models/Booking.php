<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'kode_booking',
        'user_id',
        'paket_id',
        'jadwal_id',
        'status',
        'catatan',
        'catatan_admin',
        'sumber',
        'total_harga',
    ];

    protected $casts = [
        'total_harga' => 'decimal:2',
    ];

    // Auto-generate kode_booking saat create
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            if (empty($booking->kode_booking)) {
                $booking->kode_booking = self::generateKodeBooking();
            }
        });
    }

    public static function generateKodeBooking(): string
    {
        $tanggal = now()->format('Ymd');
        $lastBooking = self::whereDate('created_at', today())->latest()->first();
        $urutan = $lastBooking ? (int) substr($lastBooking->kode_booking, -3) + 1 : 1;
        return 'SB-' . $tanggal . '-' . str_pad($urutan, 3, '0', STR_PAD_LEFT);
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }

    public function gaun()
    {
        return $this->belongsToMany(KoleksiGaun::class, 'booking_gaun')
                    ->withPivot('tanggal_ambil', 'tanggal_kembali', 'harga_sewa', 'status', 'catatan')
                    ->withTimestamps();
    }

    public function staff()
    {
        return $this->belongsToMany(Staff::class, 'staff_booking')
                    ->withPivot('peran', 'catatan')
                    ->withTimestamps();
    }

    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class);
    }
}
