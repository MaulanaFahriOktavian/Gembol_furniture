<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Buat kategori dulu
        $categories = [
            ['name' => 'Ruang Tamu', 'slug' => 'ruang-tamu', 'description' => 'Furniture premium untuk ruang tamu', 'is_active' => true],
            ['name' => 'Kamar Tidur', 'slug' => 'kamar-tidur', 'description' => 'Furniture untuk kamar tidur', 'is_active' => true],
            ['name' => 'Ruang Makan', 'slug' => 'ruang-makan', 'description' => 'Meja dan kursi makan', 'is_active' => true],
            ['name' => 'Dekorasi', 'slug' => 'dekorasi', 'description' => 'Aksesoris dan dekorasi', 'is_active' => true],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(['slug' => $cat['slug']], $cat);
        }

        // Ambil kategori
        $ruangTamu = Category::where('slug', 'ruang-tamu')->first();
        $kamarTidur = Category::where('slug', 'kamar-tidur')->first();
        $ruangMakan = Category::where('slug', 'ruang-makan')->first();
        $dekorasi = Category::where('slug', 'dekorasi')->first();

        // Produk sample
        $products = [
            [
                'category_id' => $ruangTamu->id,
                'name' => 'Sofa Lounge Velvet Sagara',
                'slug' => 'sofa-lounge-velvet-sagara',
                'short_description' => 'Sofa premium velvet Italia, nyaman & elegan',
                'description' => 'Sofa lounge premium dengan rangka kayu jati solid dan lapisan velvet Italia pilihan. Desain modern organik yang menghadirkan keseimbangan antara estetika dan kenyamanan tertinggi.',
                'price' => 12500000,
                'stock' => 8,
                'status' => 'active',
                'is_featured' => true,
                'variants' => ['Hijau Zamrud', 'Cokelat Tembakau', 'Biru Tengah Malam'],
                'finishes' => ['Natural Jati', 'Dark Walnut', 'White Wash'],
                'specifications' => [
                    'Material Rangka' => 'Kayu Jati Solid Grade A',
                    'Material Kain' => 'Velvet Italia 380 GSM',
                    'Dimensi' => '220 cm × 90 cm × 82 cm',
                    'Kapasitas' => '3 Orang'
                ],
                'rating_average' => 4.9,
                'review_count' => 127,
                'sold_count' => 342,
            ],
            [
                'category_id' => $ruangMakan->id,
                'name' => 'Meja Makan Kayu Jati',
                'slug' => 'meja-makan-kayu-jati',
                'short_description' => 'Meja makan minimalis kayu jati solid',
                'description' => 'Meja makan dari kayu jati pilihan dengan finishing natural. Kapasitas 6-8 orang, cocok untuk momen kebersamaan keluarga.',
                'price' => 8900000,
                'stock' => 12,
                'status' => 'active',
                'is_featured' => true,
                'variants' => ['Natural', 'Dark Walnut'],
                'finishes' => ['Natural Oil', 'Matte Clear'],
                'specifications' => [
                    'Material' => 'Kayu Jati Solid',
                    'Dimensi' => '180 cm × 90 cm × 75 cm',
                    'Kapasitas' => '6-8 Orang'
                ],
                'rating_average' => 4.7,
                'review_count' => 32,
                'sold_count' => 89,
            ],
            [
                'category_id' => $kamarTidur->id,
                'name' => 'Ranjang Kayu Walnut',
                'slug' => 'ranjang-kayu-walnut',
                'short_description' => 'Ranjang modern headboard empuk',
                'description' => 'Ranjang minimalis modern dari kayu walnut dengan desain clean. Headboard empuk untuk kenyamanan maksimal.',
                'price' => 6200000,
                'stock' => 6,
                'status' => 'active',
                'is_featured' => true,
                'variants' => ['Walnut Natural', 'Ebony'],
                'finishes' => ['Semi-Matte', 'Glossy'],
                'specifications' => [
                    'Material' => 'Kayu Walnut',
                    'Ukuran' => 'Queen (160×200 cm)',
                    'Tinggi' => '95 cm'
                ],
                'rating_average' => 4.8,
                'review_count' => 28,
                'sold_count' => 114,
            ],
            [
                'category_id' => $dekorasi->id,
                'name' => 'Lampu Meja Keramik',
                'slug' => 'lampu-meja-keramik',
                'short_description' => 'Lampu meja artisan keramik handmade',
                'description' => 'Lampu meja dengan dasar keramik handmade dan shade linen. Memberikan pencahayaan hangat dan estetika artisan.',
                'price' => 1350000,
                'stock' => 24,
                'status' => 'active',
                'is_featured' => true,
                'variants' => ['Krem Matte', 'Terracotta', 'Putih Glossy'],
                'finishes' => ['Natural Clay', 'Glazed White'],
                'specifications' => [
                    'Material Dasar' => 'Keramik Handmade',
                    'Material Shade' => 'Linen Premium',
                    'Tinggi' => '45 cm'
                ],
                'rating_average' => 4.6,
                'review_count' => 19,
                'sold_count' => 205,
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(['slug' => $product['slug']], $product);
        }

        $this->command->info('✅ Produk & kategori berhasil di-seed!');
    }
}