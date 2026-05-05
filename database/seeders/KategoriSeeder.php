<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::create([
            'nama' => 'Sewa Pakaian',
            'slug' => 'sewa-pakaian',
            'icon' => 'shirt',
            'deskripsi' => 'Sewa berbagai jenis pakaian untuk pernikahan, pesta, dan acara spesial.',
            'urutan' => 1,
            'is_active' => true,
        ]);

        Kategori::create([
            'nama' => 'Photography',
            'slug' => 'photography',
            'icon' => 'camera',
            'deskripsi' => 'Layanan fotografi profesional untuk berbagai momen spesial.',
            'urutan' => 2,
            'is_active' => true,
        ]);

        Kategori::create([
            'nama' => 'Makeup & Hair',
            'slug' => 'makeup-hair',
            'icon' => 'sparkles',
            'deskripsi' => 'Layanan makeup dan penataan rambut profesional.',
            'urutan' => 3,
            'is_active' => true,
        ]);

        $this->command->info('✅ Berhasil membuat 3 kategori');
    }
}
