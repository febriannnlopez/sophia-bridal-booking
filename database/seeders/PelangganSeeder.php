<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        $siti = User::where('email', 'siti@example.com')->first();
        Pelanggan::create([
            'user_id' => $siti->id,
            'no_telp' => '081234567001',
            'no_whatsapp' => '081234567001',
            'alamat' => 'Jl. Sudirman No. 123, Pekanbaru',
            'tanggal_lahir' => '1995-08-15',
            'jenis_kelamin' => 'P',
        ]);

        $budi = User::where('email', 'budi@example.com')->first();
        Pelanggan::create([
            'user_id' => $budi->id,
            'no_telp' => '081234567002',
            'no_whatsapp' => '081234567002',
            'alamat' => 'Jl. Riau No. 45, Pekanbaru',
            'tanggal_lahir' => '1992-03-20',
            'jenis_kelamin' => 'L',
        ]);

        $maria = User::where('email', 'maria@example.com')->first();
        Pelanggan::create([
            'user_id' => $maria->id,
            'no_telp' => '081234567003',
            'no_whatsapp' => '081234567003',
            'alamat' => 'Jl. Tuanku Tambusai No. 78, Pekanbaru',
            'tanggal_lahir' => '1990-12-05',
            'jenis_kelamin' => 'P',
        ]);

        $this->command->info('✅ Berhasil membuat 3 pelanggan');
    }
}
