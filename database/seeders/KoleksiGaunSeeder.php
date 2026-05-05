<?php

namespace Database\Seeders;

use App\Models\KoleksiGaun;
use Illuminate\Database\Seeder;

class KoleksiGaunSeeder extends Seeder
{
    public function run(): void
    {
        $gaunList = [
            // Gaun Pengantin (5)
            ['kode' => 'GP-001', 'nama' => 'Gaun Pengantin Royal Princess', 'kat' => 'gaun_pengantin', 'ukuran' => 'M', 'warna' => 'Putih', 'harga' => 750000],
            ['kode' => 'GP-002', 'nama' => 'Gaun Pengantin Mermaid Lace', 'kat' => 'gaun_pengantin', 'ukuran' => 'L', 'warna' => 'Putih Gading', 'harga' => 1200000],
            ['kode' => 'GP-003', 'nama' => 'Gaun Pengantin A-Line Classic', 'kat' => 'gaun_pengantin', 'ukuran' => 'S', 'warna' => 'Putih', 'harga' => 850000],
            ['kode' => 'GP-004', 'nama' => 'Gaun Pengantin Ball Gown Premium', 'kat' => 'gaun_pengantin', 'ukuran' => 'M', 'warna' => 'Putih Pearl', 'harga' => 1500000],
            ['kode' => 'GP-005', 'nama' => 'Gaun Pengantin Big Size', 'kat' => 'gaun_pengantin', 'ukuran' => 'XL', 'warna' => 'Putih', 'harga' => 950000],

            // Gaun Pesta (4)
            ['kode' => 'GS-001', 'nama' => 'Gaun Pesta Merah Elegant', 'kat' => 'gaun_pesta', 'ukuran' => 'M', 'warna' => 'Merah Marun', 'harga' => 350000],
            ['kode' => 'GS-002', 'nama' => 'Gaun Pesta Navy Glamour', 'kat' => 'gaun_pesta', 'ukuran' => 'L', 'warna' => 'Navy Blue', 'harga' => 400000],
            ['kode' => 'GS-003', 'nama' => 'Gaun Pesta Gold Sequin', 'kat' => 'gaun_pesta', 'ukuran' => 'S', 'warna' => 'Gold', 'harga' => 450000],
            ['kode' => 'GS-004', 'nama' => 'Gaun Pesta Hitam Klasik', 'kat' => 'gaun_pesta', 'ukuran' => 'M', 'warna' => 'Hitam', 'harga' => 300000],

            // Kebaya (3)
            ['kode' => 'KB-001', 'nama' => 'Kebaya Modern Putih Pengantin', 'kat' => 'kebaya', 'ukuran' => 'M', 'warna' => 'Putih', 'harga' => 600000],
            ['kode' => 'KB-002', 'nama' => 'Kebaya Tradisional Encim', 'kat' => 'kebaya', 'ukuran' => 'L', 'warna' => 'Krem', 'harga' => 500000],
            ['kode' => 'KB-003', 'nama' => 'Kebaya Brokat Pesta', 'kat' => 'kebaya', 'ukuran' => 'S', 'warna' => 'Pink Salem', 'harga' => 450000],

            // Baju Adat (2)
            ['kode' => 'BA-001', 'nama' => 'Baju Adat Melayu Riau', 'kat' => 'baju_adat', 'ukuran' => 'M', 'warna' => 'Kuning Emas', 'harga' => 700000],
            ['kode' => 'BA-002', 'nama' => 'Baju Adat Padang', 'kat' => 'baju_adat', 'ukuran' => 'L', 'warna' => 'Merah Hati', 'harga' => 750000],

            // Cheongsam (3)
            ['kode' => 'CH-001', 'nama' => 'Cheongsam Merah Imlek', 'kat' => 'cheongsam', 'ukuran' => 'M', 'warna' => 'Merah Cerah', 'harga' => 400000],
            ['kode' => 'CH-002', 'nama' => 'Cheongsam Oriental Classic', 'kat' => 'cheongsam', 'ukuran' => 'S', 'warna' => 'Burgundy', 'harga' => 450000],
            ['kode' => 'CH-003', 'nama' => 'Cheongsam Modern Floral', 'kat' => 'cheongsam', 'ukuran' => 'L', 'warna' => 'Pink Floral', 'harga' => 500000],

            // Suit Pria (3)
            ['kode' => 'SP-001', 'nama' => 'Suit Hitam Formal Pengantin', 'kat' => 'suit_pria', 'ukuran' => 'L', 'warna' => 'Hitam', 'harga' => 400000],
            ['kode' => 'SP-002', 'nama' => 'Suit Navy Wedding', 'kat' => 'suit_pria', 'ukuran' => 'M', 'warna' => 'Navy', 'harga' => 450000],
            ['kode' => 'SP-003', 'nama' => 'Tuxedo Putih Premium', 'kat' => 'suit_pria', 'ukuran' => 'L', 'warna' => 'Putih', 'harga' => 600000],
        ];

        foreach ($gaunList as $gaun) {
            KoleksiGaun::create([
                'kode_gaun' => $gaun['kode'],
                'nama' => $gaun['nama'],
                'kategori' => $gaun['kat'],
                'ukuran' => $gaun['ukuran'],
                'warna' => $gaun['warna'],
                'harga_sewa' => $gaun['harga'],
                'deskripsi' => 'Koleksi ' . $gaun['nama'] . ' tersedia dalam kondisi baik.',
                'status' => 'tersedia',
            ]);
        }

        $this->command->info('✅ Berhasil membuat ' . count($gaunList) . ' koleksi gaun');
    }
}
