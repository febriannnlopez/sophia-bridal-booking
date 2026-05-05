<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffBooking extends Model
{
    use HasFactory;

    protected $table = 'staff_booking';

    protected $fillable = [
        'booking_id',
        'staff_id',
        'peran',
        'catatan',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
