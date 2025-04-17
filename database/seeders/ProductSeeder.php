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
        Product::truncate(); // vymaže všetky produkty

        // 1. Create Categories
        $surfboards = Category::firstOrCreate(['name' => 'Surfboards']);
        $equipment = Category::firstOrCreate(['name' => 'Equipment']);
        $accessories = Category::firstOrCreate(['name' => 'Accessories']);

        // 2. Create Subcategories
        $short = $surfboards->subcategories()->firstOrCreate(['name' => 'Short Surfboards']);
        $long = $surfboards->subcategories()->firstOrCreate(['name' => 'Long Surfboards']);
        $mid = $surfboards->subcategories()->firstOrCreate(['name' => 'Mid-length Surfboards']);

        $neopren = $equipment->subcategories()->firstOrCreate(['name' => 'Neoprens']);
        $fins = $equipment->subcategories()->firstOrCreate(['name' => 'Fins']);
        $leashes = $equipment->subcategories()->firstOrCreate(['name' => 'Leashes']);

        $tshirts = $accessories->subcategories()->firstOrCreate(['name' => 'T-shirts']);
        $hats = $accessories->subcategories()->firstOrCreate(['name' => 'Hats']);

        // 3. Products IMAGES
        // SURFBOARD
        $product1 = Product::create([
            'name' => 'Wave rider Pro',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 499.99,
            'color' => 'blue',
            'size' => '6\'0"',
            'image' => 'surfboard_green.jpg',
            'stock' => 10,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $short->id,
        ]);

        $product2 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'image' => 'surfboard_darkgreen.jpg',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $short->id,
        ]);

        $product3 = Product::create([
            'name' => 'ABC rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'image' => 'surfboard_darkred.jpg',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $short->id,
        ]);

        $product4 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'image' => 'surfboard_whitegreen.jpg',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $mid->id,
        ]);

        $product5 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'image' => 'dark_blue_surfboard.jpg',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $mid->id,
        ]);

        $product6 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'image' => 'light_blue_surfboard.jpg',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $mid->id,
        ]);

        $product7 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'image' => 'bee_yellow_surfboard.jpg',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $long->id,
        ]);

        $product8 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'image' => 'surfboard_green.jpg',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $long->id,
        ]);

        $product9 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'image' => 'surfboard_green.jpg',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $long->id,
        ]);

        $product10 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'image' => 'surfboard_green.jpg',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $short->id,
        ]);



        // EQUIPMENT
        $product100 = Product::create([
            'name' => 'Wetsuit exclusive',
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

        $product101 = Product::create([
            'name' => 'Wave Leash',
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

        // ACCESSORIES
        


        // IMAGES 
        $product1->images()->createMany([
            ['image_path' => 'surfboards/surfboard_green.jpg'],
            ['image_path' => 'surfboards/green_tshirt.jpg'],
        ]);

        $product2->images()->createMany([
            ['image_path' => 'wetsuits/wetsuit_black.jpg'],
            ['image_path' => 'wetsuits/wetsuit_back.jpg'],
        ]);

        $product3->images()->createMany([
            ['image_path' => 'leashes/leash_red.jpg'],
            ['image_path' => 'leashes/leash_detail.jpg'],
        ]);
    }
}