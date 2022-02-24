<?php

namespace Database\Seeders;

use App\Models\Product\Cart;
use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::factory(5)->create();
    }
}
