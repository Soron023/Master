<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Samsung Galaxy',
                'description' => 'Samsung Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Samsung',
                'price' => 100
            ],
            [
                'name' => 'Apple iPhone 12',
                'description' => 'Apple Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Iphone',
                'price' => 500
            ],
            [
                'name' => 'Google Pixel 2 XL',
                'description' => 'Google Pixel Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Google',
                'price' => 400
            ],
            [
                'name' => 'LG V10 H800',
                'description' => 'LG Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=LG',
                'price' => 200
            ],
            [
                'name' => 'Samsung Note22',
                'description' => 'Samsung Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Note 22',
                'price' => 800
            ],
            [
                'name' => 'Apple iPhone 13',
                'description' => 'Apple Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Iphone 13',
                'price' => 500
            ],
            [
                'name' => 'Google Pixel 22',
                'description' => 'Google Pixel Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Google22',
                'price' => 600
            ],
            [
                'name' => 'LG V10 8800',
                'description' => 'LG Brand',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=LG8800',
                'price' => 500
            ]
        ];
  
        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}
