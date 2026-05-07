<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🌱 Memulai proses seeding database Sophia Bridal...');
        $this->command->newLine();

        // Urutan ini PENTING karena ada foreign key dependencies
        $this->call([
            UserSeeder::class,        // 1. Buat users dulu
            StaffSeeder::class,       // 2. Profile staff (perlu users)
            PelangganSeeder::class,   // 3. Profile pelanggan (perlu users)
            KategoriSeeder::class,    // 4. Kategori (independent)
            LayananSeeder::class,     // 5. Layanan (perlu kategori)
            PaketSeeder::class,       // 6. Paket + items (perlu layanan)
            KoleksiGaunSeeder::class, // 7. Koleksi gaun (independent)
            JadwalSeeder::class,      // 8. Jadwal (independent)
            GaleriSeeder::class,      // 9. Galeri (independent) — NEW
            TestimoniSeeder::class,   // 10. Testimoni (perlu users untuk disetujui_oleh) — NEW
        ]);

        $this->command->newLine();
        $this->command->info('🎉 Seeding database SELESAI!');
        $this->command->newLine();

        $this->command->table(
            ['Email Admin', 'Email Staff', 'Email Pelanggan', 'Password'],
            [
                ['admin@sophiabridal.com', 'andi@sophiabridal.com', 'siti@example.com', 'password123'],
                ['', 'ira@sophiabridal.com', 'budi@example.com', ''],
                ['', 'rina@sophiabridal.com', 'maria@example.com', ''],
            ]
        );
    }
}
