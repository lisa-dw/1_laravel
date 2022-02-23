<?php

namespace Database\Seeders;

use App\Models\Product\cart;
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
        cart::factory(5)->create();
    }
}
