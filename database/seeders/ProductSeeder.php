<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run()
    {
        // Pastikan kategori sudah ada
        // Cara 1: Ambil kategori yang sudah dibuat sebelumnya
        $rumahCategory = Category::where('slug', 'rumah')->first();
        $apartemenCategory = Category::where('slug', 'apartemen')->first();
        $kursiCategory = Category::where('slug', 'kursi')->first();
        $mejaCategory = Category::where('slug', 'meja')->first();

        // Jika kategori belum ada, buat dulu
        if (!$rumahCategory) {
            $rumahCategory = Category::create([
                'name' => 'Rumah',
                'slug' => 'rumah',
                'description' => 'Kategori properti rumah'
            ]);
        }

        if (!$apartemenCategory) {
            $apartemenCategory = Category::create([
                'name' => 'Apartemen',
                'slug' => 'apartemen',
                'description' => 'Kategori apartemen'
            ]);
        }

        if (!$kursiCategory) {
            $kursiCategory = Category::create([
                'name' => 'Kursi',
                'slug' => 'kursi',
                'description' => 'Kategori furniture kursi'
            ]);
        }

        if (!$mejaCategory) {
            $mejaCategory = Category::create([
                'name' => 'Meja',
                'slug' => 'meja',
                'description' => 'Kategori furniture meja'
            ]);
        }

        // ===== PRODUK PROPERTY =====
        Product::create([
            'category_id' => $rumahCategory->id,
            'name' => 'Rumah Mewah Minimalis 2 Lantai',
            'slug' => 'rumah-mewah-minimalis-2-lantai',
            'description' => 'Rumah mewah dengan desain minimalis, 2 lantai, 4 kamar tidur, 3 kamar mandi, carport 2 mobil, garden area.',
            'price' => 2500000000,
            'stock' => 1,
            'type' => 'property',
            'images' => json_encode(['rumah1.jpg', 'rumah2.jpg']), // jika ada field images
        ]);

        Product::create([
            'category_id' => $apartemenCategory->id,
            'name' => 'Apartemen Studio di CBD',
            'slug' => 'apartemen-studio-di-cbd',
            'description' => 'Apartemen studio strategis di pusat kota, fully furnished, fasilitas lengkap: gym, pool, security 24/7.',
            'price' => 800000000,
            'stock' => 5,
            'type' => 'property',
            'images' => json_encode(['apartemen1.jpg']),
        ]);

        // ===== PRODUK FURNITURE =====
        Product::create([
            'category_id' => $kursiCategory->id,
            'name' => 'Kursi Kantor Ergonomis',
            'slug' => 'kursi-kantor-ergonomis',
            'description' => 'Kursi kantor ergonomis dengan adjustable height, lumbar support, dan bahan mesh yang nyaman.',
            'price' => 1500000,
            'stock' => 50,
            'type' => 'furniture',
            'images' => json_encode(['kursi1.jpg', 'kursi2.jpg']),
        ]);

        Product::create([
            'category_id' => $mejaCategory->id,
            'name' => 'Meja Makan Minimalis 6 Kursi',
            'slug' => 'meja-makan-minimalis-6-kursi',
            'description' => 'Set meja makan minimalis dengan 6 kursi, material kayu jati solid, finish natural.',
            'price' => 3500000,
            'stock' => 20,
            'type' => 'furniture',
            'images' => json_encode(['meja1.jpg']),
        ]);

        Product::create([
            'category_id' => $mejaCategory->id,
            'name' => 'Meja Kerja Modern',
            'slug' => 'meja-kerja-modern',
            'description' => 'Meja kerja modern dengan rak buku terintegrasi, material MDF tebal, warna putih dan kayu.',
            'price' => 1200000,
            'stock' => 30,
            'type' => 'furniture',
            'images' => json_encode(['meja-kerja1.jpg']),
        ]);

        // Tambah produk lainnya sesuai kebutuhan...
        
        echo "Product seeder berhasil dijalankan!\n";
        echo "Total produk: " . Product::count() . "\n";
    }
}