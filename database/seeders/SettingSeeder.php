<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;


class SettingSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Property & Furniture', 'type' => 'text', 'description' => 'Nama website'],
            ['key' => 'site_email', 'value' => 'info@propertyfurniture.com', 'type' => 'text', 'description' => 'Email kontak'],
            ['key' => 'site_phone', 'value' => '+62 21 12345678', 'type' => 'text', 'description' => 'Telepon kontak'],
            ['key' => 'site_address', 'value' => 'Jl. Contoh No. 123, Jakarta', 'type' => 'text', 'description' => 'Alamat perusahaan'],
            ['key' => 'currency', 'value' => 'IDR', 'type' => 'text', 'description' => 'Mata uang'],
            ['key' => 'currency_symbol', 'value' => 'Rp', 'type' => 'text', 'description' => 'Simbol mata uang'],
            ['key' => 'tax_percentage', 'value' => '10', 'type' => 'number', 'description' => 'Persentase pajak (%)'],
            ['key' => 'shipping_cost', 'value' => '10000', 'type' => 'number', 'description' => 'Biaya pengiriman default'],
            ['key' => 'min_stock_notification', 'value' => '5', 'type' => 'number', 'description' => 'Notifikasi stok minimum'],
            ['key' => 'maintenance_mode', 'value' => 'false', 'type' => 'boolean', 'description' => 'Mode maintenance'],
            ['key' => 'enable_registration', 'value' => 'true', 'type' => 'boolean', 'description' => 'Aktifkan registrasi user'],
            ['key' => 'enable_reviews', 'value' => 'true', 'type' => 'boolean', 'description' => 'Aktifkan review produk'],
            ['key' => 'meta_description', 'value' => 'Sistem e-commerce property dan perabotan rumah tangga', 'type' => 'text', 'description' => 'Meta description'],
            ['key' => 'meta_keywords', 'value' => 'property, rumah, apartemen, furniture, perabotan', 'type' => 'text', 'description' => 'Meta keywords'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}