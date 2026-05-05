<?php

namespace Database\Seeders;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        // Andi Photographer
        $andi = User::where('email', 'andi@sophiabridal.com')->first();
        Staff::create([
            'user_id' => $andi->id,
            'jabatan' => 'photographer',
            'spesialisasi' => 'Wedding & Prewedding',
            'bio' => 'Photographer dengan pengalaman 5 tahun di bidang wedding dan prewedding. Spesialis outdoor photography.',
            'no_telp' => '081234567890',
            'is_active' => true,
        ]);

        // Ira Huang MUA
        $ira = User::where('email', 'ira@sophiabridal.com')->first();
        Staff::create([
            'user_id' => $ira->id,
            'jabatan' => 'makeup_artist',
            'spesialisasi' => 'Bridal Makeup, Cheongsam, Pesta',
            'bio' => 'Makeup Artist profesional spesialis bridal dan tema oriental. Pemilik akun @irahuang_makeup.',
            'no_telp' => '081287799710',
            'is_active' => true,
        ]);

        // Rina Admin
        $rina = User::where('email', 'rina@sophiabridal.com')->first();
        Staff::create([
            'user_id' => $rina->id,
            'jabatan' => 'admin',
            'spesialisasi' => 'Customer Service & Booking Management',
            'bio' => 'Admin operasional yang mengelola jadwal booking dan komunikasi dengan pelanggan.',
            'no_telp' => '081365657228',
            'is_active' => true,
        ]);

        $this->command->info('✅ Berhasil membuat 3 staff');
    }
}
