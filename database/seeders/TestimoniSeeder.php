<?php

namespace Database\Seeders;

use App\Models\Testimoni;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimoni = [
            // ===========================================
            // TESTIMONI FEATURED (tampil di beranda)
            // ===========================================
            [
                'booking_id' => null,
                'user_id' => null,
                'nama_klien' => 'Diana & Reza',
                'profesi' => 'Pasangan Pengantin',
                'foto_klien' => 'photozone/img/testimonial-1.jpg',
                'rating' => 5,
                'judul' => 'Pelayanan Sangat Memuaskan!',
                'isi' => 'Pelayanannya sangat memuaskan! Gaun pengantin koleksinya banyak pilihan, makeup artistnya juga profesional. Hasil foto preweddingnya luar biasa, recommended banget untuk yang lagi cari bridal di Pekanbaru!',
                'status' => 'disetujui',
                'tampil_di_beranda' => true,
                'urutan' => 1,
                'disetujui_oleh' => 1, // admin Irawati
                'tanggal_disetujui' => Carbon::now()->subDays(30),
            ],
            [
                'booking_id' => null,
                'user_id' => null,
                'nama_klien' => 'Sarah Putri',
                'profesi' => 'Pengantin Wanita',
                'foto_klien' => 'photozone/img/testimonial-2.jpg',
                'rating' => 5,
                'judul' => 'Mewujudkan Impian Pernikahanku',
                'isi' => 'Sophia Bridal benar-benar mewujudkan impian pernikahan saya. Dari konsultasi awal sampai hari H, semuanya terkoordinasi dengan baik. Tim yang sangat profesional dan ramah. Terima kasih Sophia Bridal!',
                'status' => 'disetujui',
                'tampil_di_beranda' => true,
                'urutan' => 2,
                'disetujui_oleh' => 1,
                'tanggal_disetujui' => Carbon::now()->subDays(20),
            ],
            [
                'booking_id' => null,
                'user_id' => null,
                'nama_klien' => 'Budi & Maria',
                'profesi' => 'Pasangan Pengantin',
                'foto_klien' => 'photozone/img/testimonial-3.jpg',
                'rating' => 5,
                'judul' => 'Foto Prewedding Bagus Banget!',
                'isi' => 'Foto preweddingnya bagus banget, fotografer Andi sangat sabar dan kreatif dalam mengarahkan pose. Harga juga sangat reasonable untuk kualitas yang didapat. Highly recommended!',
                'status' => 'disetujui',
                'tampil_di_beranda' => true,
                'urutan' => 3,
                'disetujui_oleh' => 1,
                'tanggal_disetujui' => Carbon::now()->subDays(15),
            ],
            [
                'booking_id' => null,
                'user_id' => null,
                'nama_klien' => 'Linda Wijaya',
                'profesi' => 'Klien Cheongsam',
                'foto_klien' => 'photozone/img/testimonial-4.jpg',
                'rating' => 5,
                'judul' => 'Cheongsam Cantik & Berkualitas',
                'isi' => 'Saya sewa cheongsam untuk acara Imlek. Koleksi cheongsam-nya cantik banget, kainnya berkualitas. Makeup oleh Ira juga sempurna untuk tema oriental. Pasti balik lagi!',
                'status' => 'disetujui',
                'tampil_di_beranda' => true,
                'urutan' => 4,
                'disetujui_oleh' => 1,
                'tanggal_disetujui' => Carbon::now()->subDays(10),
            ],

            // ===========================================
            // TESTIMONI APPROVED (gak featured, di halaman testimoni)
            // ===========================================
            [
                'booking_id' => null,
                'user_id' => null,
                'nama_klien' => 'Hendra & Linda',
                'profesi' => 'Pasangan Pengantin',
                'foto_klien' => null,
                'rating' => 5,
                'judul' => 'Hari Pernikahan Tak Terlupakan',
                'isi' => 'Tim Sophia Bridal sangat profesional. Mereka membantu mewujudkan konsep wedding yang kami inginkan dengan sempurna. Foto-fotonya juga sangat estetik!',
                'status' => 'disetujui',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'disetujui_oleh' => 1,
                'tanggal_disetujui' => Carbon::now()->subDays(45),
            ],
            [
                'booking_id' => null,
                'user_id' => null,
                'nama_klien' => 'Maya Sari',
                'profesi' => 'Pengantin Wanita',
                'foto_klien' => null,
                'rating' => 4,
                'judul' => 'Makeup Tahan Lama',
                'isi' => 'Makeup pengantin oleh Ira benar-benar tahan lama. Dari akad sampai resepsi malam, makeup-nya tetap sempurna. Hasil foto pun maksimal.',
                'status' => 'disetujui',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'disetujui_oleh' => 1,
                'tanggal_disetujui' => Carbon::now()->subDays(60),
            ],
            [
                'booking_id' => null,
                'user_id' => null,
                'nama_klien' => 'Kevin & Cindy',
                'profesi' => 'Pasangan Pengantin',
                'foto_klien' => null,
                'rating' => 5,
                'judul' => 'All In One Service',
                'isi' => 'Suka banget dengan paket all-in-one Sophia Bridal. Sewa gaun, makeup, dan photography semuanya satu tempat. Hemat waktu dan tenaga, hasil tetap berkualitas tinggi!',
                'status' => 'disetujui',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'disetujui_oleh' => 1,
                'tanggal_disetujui' => Carbon::now()->subDays(75),
            ],
            [
                'booking_id' => null,
                'user_id' => null,
                'nama_klien' => 'Ibu Susan',
                'profesi' => 'Mama Pengantin',
                'foto_klien' => null,
                'rating' => 5,
                'judul' => 'Anak Saya Tampil Cantik',
                'isi' => 'Sebagai mama pengantin, saya sangat puas dengan pelayanan Sophia Bridal. Anak saya tampil sangat cantik di hari pernikahannya. Terima kasih atas dedikasi tim!',
                'status' => 'disetujui',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'disetujui_oleh' => 1,
                'tanggal_disetujui' => Carbon::now()->subDays(90),
            ],

            // ===========================================
            // TESTIMONI MENUNGGU MODERASI (untuk demo admin dashboard)
            // ===========================================
            [
                'booking_id' => null,
                'user_id' => null,
                'nama_klien' => 'Dewi Anggraini',
                'profesi' => 'Pengantin Wanita',
                'foto_klien' => null,
                'rating' => 5,
                'judul' => 'Pelayanan 5 Bintang',
                'isi' => 'Saya baru saja menggunakan jasa Sophia Bridal untuk pernikahan minggu lalu. Sangat puas dengan pelayanannya, dari awal konsultasi sampai hari H semuanya berjalan smooth.',
                'status' => 'menunggu_moderasi',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'disetujui_oleh' => null,
                'tanggal_disetujui' => null,
            ],
            [
                'booking_id' => null,
                'user_id' => null,
                'nama_klien' => 'Andre Pratama',
                'profesi' => 'Pengantin Pria',
                'foto_klien' => null,
                'rating' => 4,
                'judul' => 'Suit Pria Berkualitas',
                'isi' => 'Sewa jas formal untuk pernikahan saya, kualitas bahan oke dan jahitan rapi. Cuma agak sempit di bagian pundak, mungkin bisa ditambah ukuran custom-nya.',
                'status' => 'menunggu_moderasi',
                'tampil_di_beranda' => false,
                'urutan' => 0,
                'disetujui_oleh' => null,
                'tanggal_disetujui' => null,
            ],
        ];

        foreach ($testimoni as $item) {
            Testimoni::create($item);
        }

        $this->command->info('✅ Berhasil seed ' . count($testimoni) . ' data testimoni');
    }
}
