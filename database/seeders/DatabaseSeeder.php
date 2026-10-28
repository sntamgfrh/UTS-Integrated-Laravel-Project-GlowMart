
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Produk;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriSkincare = Kategori::firstOrCreate(
            ['nama_kategori' => 'Perawatan Wajah'],
            ['deskripsi' => 'Produk perawatan kulit wajah']
        );

        $kategoriMakeup = Kategori::firstOrCreate(
            ['nama_kategori' => 'Makeup'],
            ['deskripsi' => 'Produk riasan wajah']
        );

        $produk = [
            [
                'kategori_id' => $kategoriSkincare->id,
                'kode_produk' => 'GM001',
                'nama_produk' => 'Facial Wash',
                'merek' => 'GlowMart Beauty',
                'deskripsi' => 'Pembersih wajah harian',
                'harga' => 35000,
                'stok' => 25,
            ],
            [
                'kategori_id' => $kategoriSkincare->id,
                'kode_produk' => 'GM002',
                'nama_produk' => 'Moisturizer',
                'merek' => 'GlowMart Beauty',
                'deskripsi' => 'Pelembap wajah',
                'harga' => 55000,
                'stok' => 20,
            ],
            [
                'kategori_id' => $kategoriSkincare->id,
                'kode_produk' => 'GM003',
                'nama_produk' => 'Sunscreen SPF 50',
                'merek' => 'GlowMart Beauty',
                'deskripsi' => 'Perlindungan kulit dari sinar matahari',
                'harga' => 65000,
                'stok' => 15,
            ],
            [
                'kategori_id' => $kategoriMakeup->id,
                'kode_produk' => 'GM004',
                'nama_produk' => 'Lip Tint',
                'merek' => 'GlowMart Beauty',
                'deskripsi' => 'Pewarna bibir',
                'harga' => 40000,
                'stok' => 30,
            ],
        ];

        foreach ($produk as $data) {
            Produk::firstOrCreate(
                ['kode_produk' => $data['kode_produk']],
                $data
            );
        }
    }
}
