<?php

namespace Database\Seeders;

use App\Models\Layanan;
use App\Models\Paket;
use App\Models\PaketItem;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    public function run(): void
    {
        // ============================================
        // SEWA GAUN PENGANTIN
        // ============================================
        $sewaPengantin = Layanan::where('slug', 'sewa-gaun-pengantin')->first();

        $paket1 = Paket::create([
            'layanan_id' => $sewaPengantin->id,
            'nama' => 'Paket Sewa Gaun Pengantin Basic',
            'slug' => 'sewa-gaun-pengantin-basic',
            'harga' => 750000,
            'deskripsi' => 'Sewa gaun pengantin koleksi basic untuk 1 hari.',
            'durasi_menit' => 1440, // 24 jam
            'tipe_session' => 'flexible',
            'kapasitas_orang' => 1,
            'is_unggulan' => false,
            'is_active' => true,
        ]);
        PaketItem::create(['paket_id' => $paket1->id, 'item' => '1 unit gaun pengantin pilihan koleksi basic', 'urutan' => 1]);
        PaketItem::create(['paket_id' => $paket1->id, 'item' => 'Veil & aksesoris dasar', 'urutan' => 2]);
        PaketItem::create(['paket_id' => $paket1->id, 'item' => 'Durasi sewa 1 hari', 'urutan' => 3]);

        $paket2 = Paket::create([
            'layanan_id' => $sewaPengantin->id,
            'nama' => 'Paket Sewa Gaun Pengantin Premium',
            'slug' => 'sewa-gaun-pengantin-premium',
            'harga' => 1500000,
            'deskripsi' => 'Sewa gaun pengantin premium dengan kualitas terbaik.',
            'durasi_menit' => 1440,
            'tipe_session' => 'flexible',
            'kapasitas_orang' => 1,
            'is_unggulan' => true,
            'is_active' => true,
        ]);
        PaketItem::create(['paket_id' => $paket2->id, 'item' => '1 unit gaun pengantin koleksi premium', 'urutan' => 1]);
        PaketItem::create(['paket_id' => $paket2->id, 'item' => 'Veil mewah, aksesoris lengkap', 'urutan' => 2]);
        PaketItem::create(['paket_id' => $paket2->id, 'item' => 'Petticoat & sarung tangan', 'urutan' => 3]);
        PaketItem::create(['paket_id' => $paket2->id, 'item' => 'Durasi sewa 1 hari', 'urutan' => 4]);

        // ============================================
        // SEWA KEBAYA & BAJU ADAT
        // ============================================
        $sewaKebaya = Layanan::where('slug', 'sewa-kebaya-baju-adat')->first();

        $paket3 = Paket::create([
            'layanan_id' => $sewaKebaya->id,
            'nama' => 'Paket Sewa Kebaya Modern',
            'slug' => 'sewa-kebaya-modern',
            'harga' => 500000,
            'deskripsi' => 'Sewa kebaya modern untuk acara pesta atau lamaran.',
            'durasi_menit' => 1440,
            'tipe_session' => 'flexible',
            'kapasitas_orang' => 1,
            'is_active' => true,
        ]);
        PaketItem::create(['paket_id' => $paket3->id, 'item' => '1 unit kebaya modern', 'urutan' => 1]);
        PaketItem::create(['paket_id' => $paket3->id, 'item' => 'Bawahan kain', 'urutan' => 2]);

        // ============================================
        // SEWA CHEONGSAM & SUIT
        // ============================================
        $sewaCheongsam = Layanan::where('slug', 'sewa-cheongsam-suit')->first();

        $paket4 = Paket::create([
            'layanan_id' => $sewaCheongsam->id,
            'nama' => 'Paket Sewa Cheongsam',
            'slug' => 'sewa-cheongsam',
            'harga' => 400000,
            'deskripsi' => 'Sewa cheongsam tema oriental, cocok untuk Imlek dan acara tradisional Tionghoa.',
            'durasi_menit' => 1440,
            'tipe_session' => 'flexible',
            'kapasitas_orang' => 1,
            'is_active' => true,
        ]);
        PaketItem::create(['paket_id' => $paket4->id, 'item' => '1 unit cheongsam', 'urutan' => 1]);
        PaketItem::create(['paket_id' => $paket4->id, 'item' => 'Aksesoris pendukung', 'urutan' => 2]);

        $paket5 = Paket::create([
            'layanan_id' => $sewaCheongsam->id,
            'nama' => 'Paket Sewa Suit Formal',
            'slug' => 'sewa-suit-formal',
            'harga' => 350000,
            'deskripsi' => 'Sewa suit/jas formal pria untuk pernikahan, pesta, atau acara resmi.',
            'durasi_menit' => 1440,
            'tipe_session' => 'flexible',
            'kapasitas_orang' => 1,
            'is_active' => true,
        ]);
        PaketItem::create(['paket_id' => $paket5->id, 'item' => '1 set jas + celana', 'urutan' => 1]);
        PaketItem::create(['paket_id' => $paket5->id, 'item' => 'Kemeja + dasi/bowtie', 'urutan' => 2]);

        // ============================================
        // PREWEDDING PHOTOGRAPHY
        // ============================================
        $prewedding = Layanan::where('slug', 'prewedding-photography')->first();

        $paket6 = Paket::create([
            'layanan_id' => $prewedding->id,
            'nama' => 'Paket Prewedding Indoor Studio',
            'slug' => 'prewedding-indoor-studio',
            'harga' => 1500000,
            'deskripsi' => 'Sesi foto prewedding di studio indoor dengan 1 konsep.',
            'durasi_menit' => 180, // 3 jam
            'tipe_session' => 'studio',
            'kapasitas_orang' => 2,
            'is_active' => true,
        ]);
        PaketItem::create(['paket_id' => $paket6->id, 'item' => '1 photographer profesional', 'urutan' => 1]);
        PaketItem::create(['paket_id' => $paket6->id, 'item' => '1 konsep indoor studio', 'urutan' => 2]);
        PaketItem::create(['paket_id' => $paket6->id, 'item' => '15 foto edited high resolution', 'urutan' => 3]);
        PaketItem::create(['paket_id' => $paket6->id, 'item' => 'Semua file original', 'urutan' => 4]);

        $paket7 = Paket::create([
            'layanan_id' => $prewedding->id,
            'nama' => 'Paket Prewedding Outdoor',
            'slug' => 'prewedding-outdoor',
            'harga' => 3500000,
            'deskripsi' => 'Sesi foto prewedding outdoor dengan 2 konsep & lokasi pilihan.',
            'durasi_menit' => 360, // 6 jam
            'tipe_session' => 'outdoor',
            'kapasitas_orang' => 2,
            'is_unggulan' => true,
            'is_active' => true,
        ]);
        PaketItem::create(['paket_id' => $paket7->id, 'item' => '1 photographer profesional', 'urutan' => 1]);
        PaketItem::create(['paket_id' => $paket7->id, 'item' => '2 konsep outdoor', 'urutan' => 2]);
        PaketItem::create(['paket_id' => $paket7->id, 'item' => '30 foto edited high resolution', 'urutan' => 3]);
        PaketItem::create(['paket_id' => $paket7->id, 'item' => 'Album foto premium', 'urutan' => 4]);
        PaketItem::create(['paket_id' => $paket7->id, 'item' => 'Semua file original', 'urutan' => 5]);

        // ============================================
        // WEDDING DAY PHOTOGRAPHY
        // ============================================
        $weddingDay = Layanan::where('slug', 'wedding-day-photography')->first();

        $paket8 = Paket::create([
            'layanan_id' => $weddingDay->id,
            'nama' => 'Paket Wedding Day Standard',
            'slug' => 'wedding-day-standard',
            'harga' => 4500000,
            'deskripsi' => 'Dokumentasi wedding day dengan 1 photographer.',
            'durasi_menit' => 480, // 8 jam
            'tipe_session' => 'on_location',
            'kapasitas_orang' => 100,
            'is_active' => true,
        ]);
        PaketItem::create(['paket_id' => $paket8->id, 'item' => '1 photographer utama', 'urutan' => 1]);
        PaketItem::create(['paket_id' => $paket8->id, 'item' => 'Durasi liputan 8 jam', 'urutan' => 2]);
        PaketItem::create(['paket_id' => $paket8->id, 'item' => '100+ foto edited', 'urutan' => 3]);
        PaketItem::create(['paket_id' => $paket8->id, 'item' => 'Album wedding standard', 'urutan' => 4]);

        $paket9 = Paket::create([
            'layanan_id' => $weddingDay->id,
            'nama' => 'Paket Wedding Day Premium',
            'slug' => 'wedding-day-premium',
            'harga' => 7500000,
            'deskripsi' => 'Dokumentasi wedding day premium dengan 2 photographer + videographer.',
            'durasi_menit' => 600, // 10 jam
            'tipe_session' => 'on_location',
            'kapasitas_orang' => 200,
            'is_unggulan' => true,
            'is_active' => true,
        ]);
        PaketItem::create(['paket_id' => $paket9->id, 'item' => '2 photographer profesional', 'urutan' => 1]);
        PaketItem::create(['paket_id' => $paket9->id, 'item' => '1 videographer', 'urutan' => 2]);
        PaketItem::create(['paket_id' => $paket9->id, 'item' => 'Durasi liputan 10 jam', 'urutan' => 3]);
        PaketItem::create(['paket_id' => $paket9->id, 'item' => '300+ foto edited high resolution', 'urutan' => 4]);
        PaketItem::create(['paket_id' => $paket9->id, 'item' => 'Wedding video clip 3-5 menit', 'urutan' => 5]);
        PaketItem::create(['paket_id' => $paket9->id, 'item' => 'Album wedding premium', 'urutan' => 6]);

        // ============================================
        // FAMILY & GROUP PHOTO
        // ============================================
        $family = Layanan::where('slug', 'family-group-photo')->first();

        $paket10 = Paket::create([
            'layanan_id' => $family->id,
            'nama' => 'Paket Family Photo Studio',
            'slug' => 'family-photo-studio',
            'harga' => 800000,
            'deskripsi' => 'Foto keluarga di studio dengan konsep simple elegant.',
            'durasi_menit' => 90,
            'tipe_session' => 'studio',
            'kapasitas_orang' => 8,
            'is_active' => true,
        ]);
        PaketItem::create(['paket_id' => $paket10->id, 'item' => '1 photographer', 'urutan' => 1]);
        PaketItem::create(['paket_id' => $paket10->id, 'item' => '10 foto edited', 'urutan' => 2]);
        PaketItem::create(['paket_id' => $paket10->id, 'item' => 'Maksimal 8 orang', 'urutan' => 3]);
        PaketItem::create(['paket_id' => $paket10->id, 'item' => 'Cetak foto 4R sebanyak 5 lembar', 'urutan' => 4]);

        // ============================================
        // WEDDING MAKEUP
        // ============================================
        $weddingMakeup = Layanan::where('slug', 'wedding-makeup')->first();

        $paket11 = Paket::create([
            'layanan_id' => $weddingMakeup->id,
            'nama' => 'Paket Wedding Makeup Standard',
            'slug' => 'wedding-makeup-standard',
            'harga' => 1200000,
            'deskripsi' => 'Makeup pengantin standard untuk akad atau resepsi.',
            'durasi_menit' => 120,
            'tipe_session' => 'flexible',
            'kapasitas_orang' => 1,
            'is_active' => true,
        ]);
        PaketItem::create(['paket_id' => $paket11->id, 'item' => 'Makeup pengantin', 'urutan' => 1]);
        PaketItem::create(['paket_id' => $paket11->id, 'item' => 'Hairdo/sanggul', 'urutan' => 2]);
        PaketItem::create(['paket_id' => $paket11->id, 'item' => 'Touch up', 'urutan' => 3]);

        $paket12 = Paket::create([
            'layanan_id' => $weddingMakeup->id,
            'nama' => 'Paket Wedding Makeup Akad + Resepsi',
            'slug' => 'wedding-makeup-akad-resepsi',
            'harga' => 2500000,
            'deskripsi' => 'Makeup pengantin lengkap untuk akad dan resepsi (2 look berbeda).',
            'durasi_menit' => 240,
            'tipe_session' => 'flexible',
            'kapasitas_orang' => 1,
            'is_unggulan' => true,
            'is_active' => true,
        ]);
        PaketItem::create(['paket_id' => $paket12->id, 'item' => '2 sesi makeup (akad & resepsi)', 'urutan' => 1]);
        PaketItem::create(['paket_id' => $paket12->id, 'item' => '2 hairdo berbeda', 'urutan' => 2]);
        PaketItem::create(['paket_id' => $paket12->id, 'item' => 'Touch up sepanjang acara', 'urutan' => 3]);
        PaketItem::create(['paket_id' => $paket12->id, 'item' => 'Bonus makeup ibu pengantin', 'urutan' => 4]);

        // ============================================
        // PARTY & EVENT MAKEUP
        // ============================================
        $partyMakeup = Layanan::where('slug', 'party-event-makeup')->first();

        $paket13 = Paket::create([
            'layanan_id' => $partyMakeup->id,
            'nama' => 'Paket Makeup Pesta',
            'slug' => 'makeup-pesta',
            'harga' => 450000,
            'deskripsi' => 'Makeup untuk acara pesta atau formal event.',
            'durasi_menit' => 60,
            'tipe_session' => 'flexible',
            'kapasitas_orang' => 1,
            'is_active' => true,
        ]);
        PaketItem::create(['paket_id' => $paket13->id, 'item' => 'Makeup pesta', 'urutan' => 1]);
        PaketItem::create(['paket_id' => $paket13->id, 'item' => 'Penataan rambut simple', 'urutan' => 2]);

        $this->command->info('✅ Berhasil membuat 13 paket dengan detail items');
    }
}
