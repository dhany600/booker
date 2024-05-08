<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nama_lengkap' => 'Admin',
            'nomor_induk' => '12180215',
            'kelas' => 'XI B',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);

        $gambarPath1 = 'gambar_buku/rekomendasi.png';
        $gambarPath2 = 'gambar_buku/sejarah.png';
        $gambarPath3 = 'gambar_buku/novel-bahasa.png';
        $gambarPath4 = 'gambar_buku/karya-ilmiah.png';
        $gambarPath5 = 'gambar_buku/inggris.png';
        $gambarPath6 = 'gambar_buku/novel-inglish.png';
        $gambarPath7 = 'gambar_buku/social.png';
        $gambarPath8 = 'gambar_buku/iptek.png';

        // Category::create([
        //     'nama_kategori' => 'Rekomendasi',
        //     'gambar_kategori' => $gambarPath1,
        // ]);
        Category::create([
            'nama_kategori' => 'Sejarah',
            'gambar_kategori' => $gambarPath2,
        ]);
        Category::create([
            'nama_kategori' => 'Novel Bahasa Indonesia',
            'gambar_kategori' => $gambarPath3,
        ]);
        Category::create([
            'nama_kategori' => 'Karya Ilmiah Remaja',
            'gambar_kategori' => $gambarPath4,
        ]);
        Category::create([
            'nama_kategori' => 'Bahasa Inggris',
            'gambar_kategori' => $gambarPath5,
        ]);
        Category::create([
            'nama_kategori' => 'Novel Bahasa Inggris',
            'gambar_kategori' => $gambarPath6,
        ]);
        Category::create([
            'nama_kategori' => 'Ilmu Sosial',
            'gambar_kategori' => $gambarPath7,
        ]);
        Category::create([
            'nama_kategori' => 'Ilmu Pengetahuan & Teknologi',
            'gambar_kategori' => $gambarPath8,
        ]);
    }
}
