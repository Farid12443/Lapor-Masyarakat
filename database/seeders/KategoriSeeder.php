<?php

namespace Database\Seeders;

use App\Models\KategoriModel;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriModel::insert([
            [
                'nama_kategori' => 'Infrastruktur',
                'deskripsi' => 'Jalan rusak, lampu mati, selokan, bangunan umum.',
                'icon' => 'infrastruktur',
                'warna' => 'indigo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Kebersihan & Lingkungan',
                'deskripsi' => 'Sampah, bau, polusi, sungai kotor.',
                'icon' => 'kebersihan',
                'warna' => 'yellow',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Keamanan & Ketertiban',
                'deskripsi' => 'Keributan, pencurian, gangguan keamanan.',
                'icon' => 'keamanan',
                'warna' => 'red',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Administrasi Layanan Publik',
                'deskripsi' => 'Pelayanan lambat, surat menyurat, kelurahan.',
                'icon' => 'administrasi',
                'warna' => 'blue',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Sosial & Kesehatan',
                'deskripsi' => 'Warga sakit, bantuan sosial, kondisi darurat.',
                'icon' => 'sosial',
                'warna' => 'green',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Fasilitas Umum',
                'deskripsi' => 'Taman, WC umum, tempat bermain.',
                'icon' => 'fasilitas',
                'warna' => 'purple',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Listrik & Utilitas',
                'deskripsi' => 'Listrik mati, air PDAM, gas bocor.',
                'icon' => 'listrik',
                'warna' => 'orange',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Lainnya',
                'deskripsi' => 'Kategori bebas.',
                'icon' => 'lainnya',
                'warna' => 'teal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
