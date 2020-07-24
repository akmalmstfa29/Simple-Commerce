<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'name' => 'Black Jacket',
                'image' => 'black-jacket.jpg',
                'price' => 120
            ],
            [
                'name' => 'Denim Shirt',
                'image' => 'denim-shirt.jpg',
                'price' => 99
            ],
            [
                'name' => 'Grey Blouse',
                'image' => 'grey-blouse.jpg',
                'price' => 110
            ],
            [
                'name' => 'Sweat Shirt',
                'image' => 'sweatshirt.jpg',
                'price' => 100
            ],
            [
                'name' => 'Black Sweater',
                'image' => 'black-sweater.jpg',
                'price' => 105
            ],
            [
                'name' => 'Stripped Sweater',
                'image' => 'stripped-sweater.jpg',
                'price' => 115
            ],
            [
                'name' => 'Ripped Sweater',
                'image' => 'ripped-sweater.jpg',
                'price' => 110
            ],
            [
                'name' => 'Ripped Pants',
                'image' => 'ripped-pants.jpg',
                'price' => 99
            ]
        ]);
    }
}
