<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'pembayaran_id',
        'nomor_invoice',
        'subtotal',
        'diskon',
        'pajak',
        'total',
        'tanggal_transaksi',
        'catatan',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'diskon' => 'decimal:2',
        'pajak' => 'decimal:2',
        'total' => 'decimal:2',
        'tanggal_transaksi' => 'datetime',
    ];

    // Auto-generate nomor invoice saat create
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaksi) {
            if (empty($transaksi->nomor_invoice)) {
                $transaksi->nomor_invoice = self::generateNomorInvoice();
            }
        });
    }

    public static function generateNomorInvoice(): string
    {
        $tanggal = now()->format('Ymd');
        $last = self::whereDate('created_at', today())->latest()->first();
        $urutan = $last ? (int) substr($last->nomor_invoice, -3) + 1 : 1;
        return 'INV-' . $tanggal . '-' . str_pad($urutan, 3, '0', STR_PAD_LEFT);
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
