<?php

use Illuminate\Database\Seeder;
use App\Models\Discount;

class DiscountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discount::insert([
            [
                'discount_code' => 'D10',
                'discount_percentage' => 10
            ],
            [
                'discount_code' => 'D15',
                'discount_percentage' => 15
            ],
            [
                'discount_code' => 'D20',
                'discount_percentage' => 20
            ],
            [
                'discount_code' => 'D25',
                'discount_percentage' => 25
            ],
            [
                'discount_code' => 'D30',
                'discount_percentage' => 30
            ],
            [
                'discount_code' => 'D50',
                'discount_percentage' => 50
            ],
        ]);
    }
}
