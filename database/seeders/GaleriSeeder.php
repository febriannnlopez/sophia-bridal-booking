<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galeri = [
            // Featured di beranda (urutan 1-4)
            [
                'judul' => 'Wedding Day Diana & Reza',
                'deskripsi' => 'Momen sakral akad nikah Diana & Reza di Pekanbaru. Diabadikan dengan tema klasik elegan.',
                'foto' => 'photozone/img/project-1.jpg',
                'kategori' => 'wedding',
                'tampil_di_beranda' => true,
                'urutan' => 1,
                'aktif' => true,
            ],
            [
                'judul' => 'Prewedding Outdoor Sarah & Andi',
                'deskripsi' => 'Sesi prewedding outdoor di kebun raya, mengangkat tema natural dan romantis.',
                'foto' => 'photozone/img/project-2.jpg',
                'kategori' => 'prewedding',
                'tampil_di_beranda' => true,
                'urutan' => 2,
                'aktif' => true,
            ],
            [
                'judul' => 'Resepsi Mewah Budi & Maria',
                'deskripsi' => 'Resepsi pernikahan dengan tema gold elegant. Dekorasi & dokumentasi oleh Sophia Bridal.',
                'foto' => 'photozone/img/project-3.jpg',
                'kategori' => 'resepsi',
                'tampil_di_beranda' => true,
                'urutan' => 3,
                'aktif' => true,
            ],
            [
                'judul' => 'Akad Nikah Linda & Hendra',
                'deskripsi' => 'Akad nikah intimate wedding di rumah keluarga, momen yang penuh haru.',
                'foto' => 'photozone/img/project-4.jpg',
                'kategori' => 'akad',
                'tampil_di_beranda' => true,
                'urutan' => 4,
                'aktif' => true,
            ],

            // Galeri umum (gak featured di beranda)
            [
                'judul' => 'Wedding Outdoor Sunset',
                'deskripsi' => 'Momen romantis saat sunset, menggambarkan keindahan cinta sepasang pengantin.',
                'foto' => 'photozone/img/project-5.jpg',
                'kategori' => 'wedding',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'aktif' => true,
            ],
            [
                'judul' => 'Engagement Photo Shoot',
                'deskripsi' => 'Sesi foto pertunangan dengan konsep casual modern.',
                'foto' => 'photozone/img/project-6.jpg',
                'kategori' => 'engagement',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'aktif' => true,
            ],
            [
                'judul' => 'Wedding Couple Portrait',
                'deskripsi' => 'Potret pengantin dalam balutan gaun pengantin elegan.',
                'foto' => 'photozone/img/project-7.jpg',
                'kategori' => 'wedding',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'aktif' => true,
            ],
            [
                'judul' => 'Foto Keluarga Besar',
                'deskripsi' => 'Foto keluarga besar setelah resepsi pernikahan.',
                'foto' => 'photozone/img/project-8.jpg',
                'kategori' => 'keluarga',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'aktif' => true,
            ],
            [
                'judul' => 'Studio Photoshoot Bridal',
                'deskripsi' => 'Sesi foto studio dengan koleksi gaun terbaru Sophia Bridal.',
                'foto' => 'photozone/img/about-1.jpg',
                'kategori' => 'studio',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'aktif' => true,
            ],
            [
                'judul' => 'Prewedding Konsep Vintage',
                'deskripsi' => 'Konsep vintage retro untuk pasangan yang ingin tampilan unik dan berbeda.',
                'foto' => 'photozone/img/about-2.jpg',
                'kategori' => 'prewedding',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'aktif' => true,
            ],
            [
                'judul' => 'Wedding Cheongsam Tradisional',
                'deskripsi' => 'Sesi foto pengantin dengan cheongsam untuk acara sangjit dan teapai.',
                'foto' => 'photozone/img/service-1.jpg',
                'kategori' => 'wedding',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'aktif' => true,
            ],
            [
                'judul' => 'Family Photo Ulang Tahun',
                'deskripsi' => 'Foto keluarga dalam acara ulang tahun anak.',
                'foto' => 'photozone/img/service-2.jpg',
                'kategori' => 'keluarga',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'aktif' => true,
            ],
        ];

        foreach ($galeri as $item) {
            Galeri::create($item);
        }

        $this->command->info('✅ Berhasil seed ' . count($galeri) . ' data galeri');
    }
}
