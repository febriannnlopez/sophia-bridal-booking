<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin Utama
        User::create([
            'name' => 'Irawati (Owner)',
            'email' => 'admin@sophiabridal.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Staff: Photographer
        User::create([
            'name' => 'Andi Photographer',
            'email' => 'andi@sophiabridal.com',
            'password' => Hash::make('password123'),
            'role' => 'staff',
            'email_verified_at' => now(),
        ]);

        // Staff: Makeup Artist
        User::create([
            'name' => 'Ira Huang (MUA)',
            'email' => 'ira@sophiabridal.com',
            'password' => Hash::make('password123'),
            'role' => 'staff',
            'email_verified_at' => now(),
        ]);

        // Staff: Admin Operasional
        User::create([
            'name' => 'Rina Admin',
            'email' => 'rina@sophiabridal.com',
            'password' => Hash::make('password123'),
            'role' => 'staff',
            'email_verified_at' => now(),
        ]);

        // Pelanggan Dummy 1
        User::create([
            'name' => 'Siti Aminah',
            'email' => 'siti@example.com',
            'password' => Hash::make('password123'),
            'role' => 'pelanggan',
            'email_verified_at' => now(),
        ]);

        // Pelanggan Dummy 2
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => Hash::make('password123'),
            'role' => 'pelanggan',
            'email_verified_at' => now(),
        ]);

        // Pelanggan Dummy 3
        User::create([
            'name' => 'Maria Setiawan',
            'email' => 'maria@example.com',
            'password' => Hash::make('password123'),
            'role' => 'pelanggan',
            'email_verified_at' => now(),
        ]);

        $this->command->info('✅ Berhasil membuat 7 user (1 admin, 3 staff, 3 pelanggan)');
    }
}
