<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        // === KATEGORI: SEWA PAKAIAN ===
        $kategoriSewa = Kategori::where('slug', 'sewa-pakaian')->first();

        Layanan::create([
            'kategori_id' => $kategoriSewa->id,
            'nama' => 'Sewa Gaun Pengantin',
            'slug' => 'sewa-gaun-pengantin',
            'deskripsi' => 'Koleksi gaun pengantin western style dengan berbagai model dan ukuran.',
            'is_active' => true,
        ]);

        Layanan::create([
            'kategori_id' => $kategoriSewa->id,
            'nama' => 'Sewa Kebaya & Baju Adat',
            'slug' => 'sewa-kebaya-baju-adat',
            'deskripsi' => 'Sewa kebaya pengantin, baju adat, dan baju tradisional.',
            'is_active' => true,
        ]);

        Layanan::create([
            'kategori_id' => $kategoriSewa->id,
            'nama' => 'Sewa Cheongsam & Suit',
            'slug' => 'sewa-cheongsam-suit',
            'deskripsi' => 'Sewa cheongsam tema oriental dan suit/jas formal pria.',
            'is_active' => true,
        ]);

        // === KATEGORI: PHOTOGRAPHY ===
        $kategoriPhoto = Kategori::where('slug', 'photography')->first();

        Layanan::create([
            'kategori_id' => $kategoriPhoto->id,
            'nama' => 'Prewedding Photography',
            'slug' => 'prewedding-photography',
            'deskripsi' => 'Sesi foto prewedding indoor dan outdoor dengan konsep custom.',
            'is_active' => true,
        ]);

        Layanan::create([
            'kategori_id' => $kategoriPhoto->id,
            'nama' => 'Wedding Day Photography',
            'slug' => 'wedding-day-photography',
            'deskripsi' => 'Dokumentasi profesional untuk hari H pernikahan.',
            'is_active' => true,
        ]);

        Layanan::create([
            'kategori_id' => $kategoriPhoto->id,
            'nama' => 'Family & Group Photo',
            'slug' => 'family-group-photo',
            'deskripsi' => 'Foto keluarga, group, dan momen spesial lainnya.',
            'is_active' => true,
        ]);

        // === KATEGORI: MAKEUP & HAIR ===
        $kategoriMakeup = Kategori::where('slug', 'makeup-hair')->first();

        Layanan::create([
            'kategori_id' => $kategoriMakeup->id,
            'nama' => 'Wedding Makeup',
            'slug' => 'wedding-makeup',
            'deskripsi' => 'Makeup pengantin dengan hasil tahan lama dan natural elegant.',
            'is_active' => true,
        ]);

        Layanan::create([
            'kategori_id' => $kategoriMakeup->id,
            'nama' => 'Party & Event Makeup',
            'slug' => 'party-event-makeup',
            'deskripsi' => 'Makeup untuk pesta, acara formal, dan event spesial.',
            'is_active' => true,
        ]);

        $this->command->info('✅ Berhasil membuat 8 layanan');
    }
}
