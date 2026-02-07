<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Property Categories
        $propertyCategories = [
            ['name' => 'Rumah', 'type' => 'property', 'slug' => 'rumah'],
            ['name' => 'Apartemen', 'type' => 'property', 'slug' => 'apartemen'],
            ['name' => 'Tanah', 'type' => 'property', 'slug' => 'tanah'],
            ['name' => 'Ruko', 'type' => 'property', 'slug' => 'ruko'],
            ['name' => 'Villa', 'type' => 'property', 'slug' => 'villa'],
            ['name' => 'Kantor', 'type' => 'property', 'slug' => 'kantor'],
            ['name' => 'Gudang', 'type' => 'property', 'slug' => 'gudang'],
        ];

        // Furniture Categories
        $furnitureCategories = [
            ['name' => 'Kursi', 'type' => 'furniture', 'slug' => 'kursi'],
            ['name' => 'Meja', 'type' => 'furniture', 'slug' => 'meja'],
            ['name' => 'Lemari', 'type' => 'furniture', 'slug' => 'lemari'],
            ['name' => 'Tempat Tidur', 'type' => 'furniture', 'slug' => 'tempat-tidur'],
            ['name' => 'Sofa', 'type' => 'furniture', 'slug' => 'sofa'],
            ['name' => 'Kitchen Set', 'type' => 'furniture', 'slug' => 'kitchen-set'],
            ['name' => 'Dekorasi', 'type' => 'furniture', 'slug' => 'dekorasi'],
            ['name' => 'Lampu', 'type' => 'furniture', 'slug' => 'lampu'],
            ['name' => 'Karpet', 'type' => 'furniture', 'slug' => 'karpet'],
            ['name' => 'Gorden', 'type' => 'furniture', 'slug' => 'gorden'],
        ];

        foreach ($propertyCategories as $category) {
            Category::create($category);
        }

        foreach ($furnitureCategories as $category) {
            Category::create($category);
        }
    }
}