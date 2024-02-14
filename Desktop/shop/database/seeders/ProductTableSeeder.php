<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.

     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Product::truncate();
 
        $faker = \Faker\Factory::create();
 
        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'product_name' => $faker->sentence,
                'product_description' => $faker->sentence,
            ]);
        }
    }
}
