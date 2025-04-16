<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // 1. Create Categories
        $surfboards = Category::firstOrCreate(['name' => 'Surfboards']);
        $equipment = Category::firstOrCreate(['name' => 'Equipment']);
        $accessories = Category::firstOrCreate(['name' => 'Accessories']);

        // 2. Create Subcategories
        $short = $surfboards->subcategories()->firstOrCreate(['name' => 'Short Surfboards']);
        $long = $surfboards->subcategories()->firstOrCreate(['name' => 'Long Surfboards']);
        $mid = $surfboards->subcategories()->firstOrCreate(['name' => 'Mid-length Surfboards']);

        $wetsuits = $equipment->subcategories()->firstOrCreate(['name' => 'Wetsuits']);
        $boards = $equipment->subcategories()->firstOrCreate(['name' => 'Bodyboards']);

        $leashes = $accessories->subcategories()->firstOrCreate(['name' => 'Leashes']);
        $fins = $accessories->subcategories()->firstOrCreate(['name' => 'Fins']);

        // 3. Create Products (with additional attributes)
        Product::create([
            'name' => 'Surfboard',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 499.99,
            'color' => 'blue',
            'size' => '6\'0"',
            'image' => 'surfboards/surfboard_green.jpg',
            'stock' => 10,
            'features' => 'Carbon fiber rails, Tri-fin setup', // Simple text
            'category_id' => $surfboards->id,
            'subcategory_id' => $short->id,
        ]);

        Product::create([
            'name' => 'Wetsuit',
            'short_description' => 'Stay warm in cold waters',
            'description' => 'Durable wetsuit for cold water surfing.',
            'price' => 199.99,
            'color' => 'black',
            'size' => 'M',
            'image' => 'wetsuits/wetsuit_black.jpg',
            'stock' => 25,
            'features' => '3mm neoprene, Seam-sealed',
            'category_id' => $equipment->id,
            'subcategory_id' => $wetsuits->id,
        ]);

        Product::create([
            'name' => 'Surfboard Leash',
            'short_description' => 'Secure your board on every wave',
            'description' => 'Keep your surfboard close with this reliable leash.',
            'price' => 29.99,
            'color' => 'red',
            'size' => '6\'',
            'image' => 'leashes/leash_red.jpg',
            'stock' => 100,
            'features' => 'Swivel cord, Padded ankle cuff',
            'category_id' => $accessories->id,
            'subcategory_id' => $leashes->id,
        ]);
    }
}
