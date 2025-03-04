<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(10)->create([
            'image' => 'image.jpg',
            'product_name' => 'Iphone 12 PM',
            'category' => 'Smartphone',
            'brand' => 'Apple',
            'description' => 'Apple Smartphone has a great chip',
            'price' => 'Rp.10.000.000',
            'quantity' => '10',
       ]);
    }
}
