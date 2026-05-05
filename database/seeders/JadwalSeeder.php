<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        // Generate jadwal untuk 30 hari ke depan
        // Jam operasional Sophia Bridal: 08.30 - 18.30 WIB (sesuai bio Instagram)
        // Slot per 2 jam: 08.30, 10.30, 12.30, 14.30, 16.30

        $startDate = Carbon::today();
        $totalDays = 30;
        $totalSlots = 0;

        // Slot waktu (jam_mulai => jam_selesai)
        $slots = [
            ['08:30:00', '10:30:00'],
            ['10:30:00', '12:30:00'],
            ['13:00:00', '15:00:00'], // skip 12.30-13.00 buat istirahat
            ['15:00:00', '17:00:00'],
            ['17:00:00', '18:30:00'],
        ];

        for ($day = 0; $day < $totalDays; $day++) {
            $tanggal = $startDate->copy()->addDays($day);

            foreach ($slots as $slot) {
                Jadwal::create([
                    'tanggal' => $tanggal->format('Y-m-d'),
                    'jam_mulai' => $slot[0],
                    'jam_selesai' => $slot[1],
                    'status' => 'tersedia',
                ]);
                $totalSlots++;
            }
        }

        $this->command->info("✅ Berhasil membuat $totalSlots slot jadwal untuk $totalDays hari ke depan");
    }
}
