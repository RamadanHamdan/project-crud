<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Faker\Guesser\Name;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Database\Factories\ProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
    //    DB::table('products')->insert([
    //         'image' => Hash::make('image'),
    //         'product_name' => Hash::make('product_name'),
    //         'category' => Hash::make('category'),
    //         'brand' => Hash::make('brand'),
    //         'description' => Hash::make('description'),
    //         'price' => Hash::make('price'),
    //         'quantity' => Hash::make('quantity'),
    //    ]);

       Product::factory(100)->create([
            'image' => Hash::make('image'),
            'product_name' => Hash::make('product_name'),
            'category' => Hash::make('category'),
            'brand' => Hash::make('brand'),
            'description' => Hash::make('description'),
            'price' => Hash::make('price'),
            'quantity' => Hash::make('quantity'),
       ]);

       
    }
}
