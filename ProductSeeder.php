<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\ProductImage;

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
            'stock' => 10,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $short->id,
        ]);

        $product1->images()->createMany([
            [
                'image_path' => 'images/products/surfboard_darkgreen.jpg',
                'is_main' => true,
            ],
            [
                'image_path' => 'images/products/detail_green.jpg',
                'is_main' => false,
            ],
            [
                'image_path' => 'images/products/detail_side_green.jpg',
                'is_main' => false,
            ],
            [
                'image_path' => 'images/products/detail_green_tail.jpg',
                'is_main' => false,
            ],
        ]);

        $product2 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $short->id,
        ]);

        $product2->images()->createMany([
            [
                'image_path' => 'images/products/surfboard_darkred.jpg',
                'is_main' => true,
            ],
        ]);

        $product3 = Product::create([
            'name' => 'ABC rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $short->id,
        ]);

        $product3->images()->createMany([
            [
                'image_path' => 'images/products/surfboard_green.jpg',
                'is_main' => true,
            ],
        ]);

        $product4 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $mid->id,
        ]);

        $product4->images()->createMany([
            [
                'image_path' => 'images/products/surfboard_whitegreen.jpg',
                'is_main' => true,
            ],
        ]);

        $product5 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $mid->id,
        ]);

        $product5->images()->createMany([
            [
                'image_path' => 'images/products/dark_blue_surfboard.jpg',
                'is_main' => true,
            ],
        ]);

        $product6 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $mid->id,
        ]);

        $product6->images()->createMany([
            [
                'image_path' => 'images/products/light_blue_surfboard.jpg',
                'is_main' => true,
            ],
        ]);

        $product7 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $long->id,
        ]);

        $product7->images()->createMany([
            [
                'image_path' => 'images/products/bee_yellow_surfboard.jpg',
                'is_main' => true,
            ],
        ]);

        $product8 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $long->id,
        ]);

        $product8->images()->createMany([
            [
                'image_path' => 'images/products/surfboard_green.jpg',
                'is_main' => true,
            ],
        ]);

        $product9 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $long->id,
        ]);

        $product9->images()->createMany([
            [
                'image_path' => 'images/products/surfboard_green.jpg',
                'is_main' => true,
            ],
        ]);

        $product10 = Product::create([
            'name' => 'Wave rider',
            'short_description' => 'Fast and responsive shortboard',
            'description' => 'High-quality surfboard for experienced surfers.',
            'price' => 399.99,
            'color' => 'red',
            'size' => '6\'0"',
            'stock' => 12,
            'features' => 'Carbon fiber rails, Tri-fin setup',
            'category_id' => $surfboards->id,
            'subcategory_id' => $short->id,
        ]);

        $product10->images()->createMany([
            [
                'image_path' => 'images/products/surfboard_green.jpg',
                'is_main' => true,
            ],
        ]);

        // EQUIPMENT
        $product100 = Product::create([
            'name' => 'Wetsuit exclusive',
            'short_description' => 'Stay warm in cold waters',
            'description' => 'Durable wetsuit for cold water surfing.',
            'price' => 199.99,
            'color' => 'black',
            'size' => 'M',
            'stock' => 25,
            'features' => '3mm neoprene, Seam-sealed',
            'category_id' => $equipment->id,
            'subcategory_id' => $neopren->id,
        ]);


        $product100->images()->createMany([
            [
                'image_path' => 'images/products/neopren.jpg',
                'is_main' => true,
            ],
        ]);

        $product101 = Product::create([
            'name' => 'Cool wetsuit',
            'short_description' => 'Stay warm in cold waters',
            'description' => 'Durable wetsuit for cold water surfing.',
            'price' => 109.99,
            'color' => 'black',
            'size' => 'M',
            'stock' => 30,
            'features' => '3mm neoprene, Seam-sealed',
            'category_id' => $equipment->id,
            'subcategory_id' => $neopren->id,
        ]);

        $product101->images()->createMany([
            [
                'image_path' => 'images/products/neopren2.jpg',
                'is_main' => true,
            ],
        ]);

        $product102 = Product::create([
            'name' => 'Neopren exclusive',
            'short_description' => 'Stay warm in cold waters',
            'description' => 'Durable wetsuit for cold water surfing.',
            'price' => 499.99,
            'color' => 'black',
            'size' => 'L',
            'stock' => 25,
            'features' => '3mm neoprene, Seam-sealed',
            'category_id' => $equipment->id,
            'subcategory_id' => $neopren->id,
        ]);

        $product102->images()->createMany([
            [
                'image_path' => 'images/products/neopren3.jpg',
                'is_main' => true,
            ],
        ]);

        $product103 = Product::create([
            'name' => 'Top leash',
            'short_description' => 'Stay warm in cold waters',
            'description' => 'Durable wetsuit for cold water surfing.',
            'price' => 99.99,
            'color' => 'black',
            'size' => 'M',
            'stock' => 25,
            'features' => '3mm neoprene, Seam-sealed',
            'category_id' => $equipment->id,
            'subcategory_id' => $leashes->id,
        ]);

        $product103->images()->createMany([
            [
                'image_path' => 'images/products/leash.jpg',
                'is_main' => true,
            ],
        ]);

        $product104 = Product::create([
            'name' => 'Fast leash',
            'short_description' => 'Stay warm in cold waters',
            'description' => 'Durable wetsuit for cold water surfing.',
            'price' => 9,
            'color' => 'black',
            'size' => 'M',
            'stock' => 25,
            'features' => '3mm neoprene, Seam-sealed',
            'category_id' => $equipment->id,
            'subcategory_id' => $leashes->id,
        ]);

        $product104->images()->createMany([
            [
                'image_path' => 'images/products/leash2.jpg',
                'is_main' => true,
            ],
        ]);

        $product105 = Product::create([
            'name' => 'Leash exclusive',
            'short_description' => 'Stay warm in cold waters',
            'description' => 'Durable wetsuit for cold water surfing.',
            'price' => 19,
            'color' => 'black',
            'size' => 'M',
            'stock' => 25,
            'features' => '3mm neoprene, Seam-sealed',
            'category_id' => $equipment->id,
            'subcategory_id' => $leashes->id,
        ]);

        $product105->images()->createMany([
            [
                'image_path' => 'images/products/leash.jpg',
                'is_main' => true,
            ],
        ]);

        $product106 = Product::create([
            'name' => 'Fin exclusive',
            'short_description' => 'Stay warm in cold waters',
            'description' => 'Durable wetsuit for cold water surfing.',
            'price' => 199.99,
            'color' => 'black',
            'size' => 'M',
            'stock' => 25,
            'features' => '3mm neoprene, Seam-sealed',
            'category_id' => $equipment->id,
            'subcategory_id' => $fins->id,
        ]);

        $product106->images()->createMany([
            [
                'image_path' => 'images/products/fin.jpg',
                'is_main' => true,
            ],
        ]);

        $product107 = Product::create([
            'name' => 'Fin fan fun',
            'short_description' => 'Stay warm in cold waters',
            'description' => 'Durable wetsuit for cold water surfing.',
            'price' => 199.99,
            'color' => 'black',
            'size' => 'M',
            'stock' => 25,
            'features' => '3mm neoprene, Seam-sealed',
            'category_id' => $equipment->id,
            'subcategory_id' => $fins->id,
        ]);

        $product107->images()->createMany([
            [
                'image_path' => 'images/products/fin2.jpg',
                'is_main' => true,
            ],
        ]);

        $product108 = Product::create([
            'name' => 'Super fin',
            'short_description' => 'Stay warm in cold waters',
            'description' => 'Durable wetsuit for cold water surfing.',
            'price' => 199.99,
            'color' => 'black',
            'size' => 'M',
            'stock' => 25,
            'features' => '3mm neoprene, Seam-sealed',
            'category_id' => $equipment->id,
            'subcategory_id' => $fins->id,
        ]);

        $product108->images()->createMany([
            [
                'image_path' => 'images/products/fin.jpg',
                'is_main' => true,
            ],
        ]);

        $product109 = Product::create([
            'name' => 'Finnnnnish',
            'short_description' => 'Stay warm in cold waters',
            'description' => 'Durable wetsuit for cold water surfing.',
            'price' => 199.99,
            'color' => 'black',
            'size' => 'M',
            'image' => 'fin.jpg',
            'stock' => 25,
            'features' => '3mm neoprene, Seam-sealed',
            'category_id' => $equipment->id,
            'subcategory_id' => $fins->id,
        ]);
        
        $product109->images()->createMany([
            [
                'image_path' => 'images/products/fin.jpg',
                'is_main' => true,
            ],
        ]);

        // ACCESSORIES
        $product1000 = Product::create([
            'name' => 'Wave Leash',
            'short_description' => 'Secure your board on every wave',
            'description' => 'Keep your surfboard close with this reliable leash.',
            'price' => 29.99,
            'color' => 'red',
            'size' => 'S, M, L, XL',
            'stock' => 100,
            'features' => 'Swivel cord, Padded ankle cuff',
            'category_id' => $accessories->id,
            'subcategory_id' => $tshirts->id,
        ]);

        $product1000->images()->createMany([
            [
                'image_path' => 'images/products/black_shirt.jpg',
                'is_main' => true,
            ],
        ]);

        $product1001 = Product::create([
            'name' => 'Wave Leash',
            'short_description' => 'Secure your board on every wave',
            'description' => 'Keep your surfboard close with this reliable leash.',
            'price' => 29.99,
            'color' => 'red',
            'size' => '6\'',
            'stock' => 100,
            'features' => 'Swivel cord, Padded ankle cuff',
            'category_id' => $accessories->id,
            'subcategory_id' => $tshirts->id,
        ]);

        $product1001->images()->createMany([
            [
                'image_path' => 'images/products/green_tshirt.jpg',
                'is_main' => true,
            ],
        ]);

        $product1002 = Product::create([
            'name' => 'Wave Leash',
            'short_description' => 'Secure your board on every wave',
            'description' => 'Keep your surfboard close with this reliable leash.',
            'price' => 29.99,
            'color' => 'red',
            'size' => '6\'',
            'stock' => 100,
            'features' => 'Swivel cord, Padded ankle cuff',
            'category_id' => $accessories->id,
            'subcategory_id' => $tshirts->id,
        ]);

        $product1002->images()->createMany([
            [
                'image_path' => 'images/products/cap_green.jpg',
                'is_main' => true,
            ],
        ]);

        $product1003 = Product::create([
            'name' => 'Wave Leash',
            'short_description' => 'Secure your board on every wave',
            'description' => 'Keep your surfboard close with this reliable leash.',
            'price' => 29.99,
            'color' => 'red',
            'size' => '6\'',
            'stock' => 100,
            'features' => 'Swivel cord, Padded ankle cuff',
            'category_id' => $accessories->id,
            'subcategory_id' => $tshirts->id,
        ]);

        $product1003->images()->createMany([
            [
                'image_path' => 'images/products/cap_blue.jpg',
                'is_main' => true,
            ],
        ]);

        $product1004 = Product::create([
            'name' => 'Wave Leash',
            'short_description' => 'Secure your board on every wave',
            'description' => 'Keep your surfboard close with this reliable leash.',
            'price' => 29.99,
            'color' => 'red',
            'size' => '6\'',
            'stock' => 100,
            'features' => 'Swivel cord, Padded ankle cuff',
            'category_id' => $accessories->id,
            'subcategory_id' => $tshirts->id,
        ]);

        $product1004->images()->createMany([
            [
                'image_path' => 'images/products/cap_mctavish.jpg',
                'is_main' => true,
            ],
        ]);

        $product1005 = Product::create([
            'name' => 'Hat hut hot',
            'short_description' => 'Secure your board on every wave',
            'description' => 'Keep your surfboard close with this reliable leash.',
            'price' => 29.99,
            'color' => 'red',
            'size' => '6\'',
            'stock' => 100,
            'features' => 'Swivel cord, Padded ankle cuff',
            'category_id' => $accessories->id,
            'subcategory_id' => $hats->id,
        ]);

        $product1005->images()->createMany([
            [
                'image_path' => 'images/products/cap.jpg',
                'is_main' => true,
            ],
        ]);

        $product1006 = Product::create([
            'name' => 'Crazy hat',
            'short_description' => 'Secure your board on every wave',
            'description' => 'Keep your surfboard close with this reliable leash.',
            'price' => 29.99,
            'color' => 'red',
            'size' => '6\'',
            'stock' => 100,
            'features' => 'Swivel cord, Padded ankle cuff',
            'category_id' => $accessories->id,
            'subcategory_id' => $hats->id,
        ]);

        $product1006->images()->createMany([
            [
                'image_path' => 'images/products/bucket_hat.jpg',
                'is_main' => true,
            ],
        ]);

        $product1007 = Product::create([
            'name' => 'Cap',
            'short_description' => 'Secure your board on every wave',
            'description' => 'Keep your surfboard close with this reliable leash.',
            'price' => 29.99,
            'color' => 'red',
            'size' => '6\'',
            'stock' => 100,
            'features' => 'Swivel cord, Padded ankle cuff',
            'category_id' => $accessories->id,
            'subcategory_id' => $hats->id,
        ]);

        $product1007->images()->createMany([
            [
                'image_path' => 'images/products/cap_blue.jpg',
                'is_main' => true,
            ],
        ]);

        $product1008 = Product::create([
            'name' => 'Hat',
            'short_description' => 'Secure your board on every wave',
            'description' => 'Keep your surfboard close with this reliable leash.',
            'price' => 29.99,
            'color' => 'red',
            'size' => '6\'',
            'stock' => 100,
            'features' => 'Swivel cord, Padded ankle cuff',
            'category_id' => $accessories->id,
            'subcategory_id' => $hats->id,
        ]);

        $product1008->images()->createMany([
            [
                'image_path' => 'images/products/cap_green.jpg',
                'is_main' => true,
            ],
        ]);

        $product1009 = Product::create([
            'name' => 'Surffffin',
            'short_description' => 'Secure your board on every wave',
            'description' => 'Keep your surfboard close with this reliable leash.',
            'price' => 29.99,
            'color' => 'red',
            'size' => '6\'',
            'stock' => 100,
            'features' => 'Swivel cord, Padded ankle cuff',
            'category_id' => $accessories->id,
            'subcategory_id' => $hats->id,
        ]);

        $product1009->images()->createMany([
            [
                'image_path' => 'images/products/bucket_hat.jpg',
                'is_main' => true,
            ],
        ]);
    }
}